<?php

namespace App\Livewire;

use App\Models\Booking;
use App\Models\Property;
use Carbon\Carbon;
use Livewire\Component;

class BookingForm extends Component
{
    public Property $property;

    public string $startDate = '';

    public string $endDate = '';

    public float $totalPrice = 0;

    public function mount(Property $property): void
    {
        $this->property = $property;
    }

    public function updatedStartDate(): void
    {
        $this->calculateTotal();
    }

    public function updatedEndDate(): void
    {
        $this->calculateTotal();
    }

    private function calculateTotal(): void
    {
        $this->totalPrice = 0;

        if (!$this->startDate || !$this->endDate) {
            return;
        }

        $start = Carbon::parse($this->startDate);
        $end = Carbon::parse($this->endDate);

        if ($end->greaterThan($start)) {
            $nights = $start->diffInDays($end);

            $this->totalPrice = $nights * (float) $this->property->price_per_night;
        }
    }

    public function rules(): array
    {
        return [
            'startDate' => [
                'required',
                'date',
                'after_or_equal:today',
            ],
            'endDate' => [
                'required',
                'date',
                'after:startDate',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'startDate.required' => 'La date d’arrivée est obligatoire.',
            'startDate.after_or_equal' => 'La date d’arrivée ne peut pas être dans le passé.',
            'endDate.required' => 'La date de départ est obligatoire.',
            'endDate.after' => 'La date de départ doit être après la date d’arrivée.',
        ];
    }

    public function calculateBooking(): void
    {
        $this->validate();

        $this->calculateTotal();

        $hasOverlap = $this->property->bookings()
            ->where('status', '!=', 'cancelled')
            ->where('start_date', '<', $this->endDate)
            ->where('end_date', '>', $this->startDate)
            ->exists();

        if ($hasOverlap) {
            $this->addError(
                'startDate',
                'Cette propriété est déjà réservée pour cette période.'
            );

            return;
        }

        Booking::create([
            'user_id' => auth()->id(),
            'property_id' => $this->property->id,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'status' => 'pending',
            'total_price' => $this->totalPrice,
        ]);
    }

    public function render()
    {
        return view('livewire.booking-form');
    }
}