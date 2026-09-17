<?php

namespace App\Livewire;

use App\Models\Property;
use Livewire\Component;
use Livewire\WithPagination;

class PropertyCatalog extends Component
{
    use WithPagination;

    public string $search = '';

    public string $startDate = '';

    public string $endDate = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedStartDate(): void
    {
        $this->resetPage();
    }

    public function updatedEndDate(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $properties = Property::query()
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->startDate && $this->endDate, function ($query) {
                $query->whereDoesntHave('bookings', function ($query) {
                    $query->where('status', '!=', 'cancelled')
                        ->where('start_date', '<', $this->endDate)
                        ->where('end_date', '>', $this->startDate);
                });
            })
            ->latest()
            ->paginate(6);

        return view('livewire.property-catalog', [
            'properties' => $properties,
        ]);
    }
}