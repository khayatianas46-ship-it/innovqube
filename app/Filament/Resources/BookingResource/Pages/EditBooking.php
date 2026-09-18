<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Property;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Validation\ValidationException;

class EditBooking extends EditRecord
{
    protected static string $resource = BookingResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $booking = $this->record;

        $property = Property::findOrFail($data['property_id']);

        $startDate = \Carbon\Carbon::parse($data['start_date']);
        $endDate = \Carbon\Carbon::parse($data['end_date']);

        if ($startDate->isBefore(today())) {
            throw ValidationException::withMessages([
                'data.start_date' => 'La date d’arrivée ne peut pas être dans le passé.',
            ]);
        }

        if (!$endDate->greaterThan($startDate)) {
            throw ValidationException::withMessages([
                'data.end_date' => 'La date de départ doit être après la date d’arrivée.',
            ]);
        }

        $hasOverlap = Booking::query()
            ->where('property_id', $data['property_id'])
            ->where('status', '!=', 'cancelled')
            ->where('id', '!=', $booking->id)
            ->where('start_date', '<', $data['end_date'])
            ->where('end_date', '>', $data['start_date'])
            ->exists();

        if ($hasOverlap) {
            throw ValidationException::withMessages([
                'data.end_date' => 'Cette propriété est déjà réservée pour cette période.',
            ]);
        }

        $nights = $startDate->diffInDays($endDate);

        $data['total_price'] = $nights * (float) $property->price_per_night;

        return $data;
    }
}