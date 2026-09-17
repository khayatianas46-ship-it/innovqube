<?php

namespace App\Livewire;

use App\Models\Booking;
use Livewire\Component;

class MyBookings extends Component
{
    public function cancelBooking(int $bookingId): void
    {
        $booking = Booking::findOrFail($bookingId);

        $this->authorize('cancel', $booking);

        if ($booking->status === 'cancelled') {
            return;
        }

        $booking->update([
            'status' => 'cancelled',
        ]);
    }

    public function render()
    {
        $bookings = Booking::with('property')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('livewire.my-bookings', [
            'bookings' => $bookings,
        ]);
    }
}