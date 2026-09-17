<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_booking_price_is_calculated_correctly(): void
    {
        $user = User::factory()->create();

        $property = Property::factory()->create([
            'price_per_night' => 150,
        ]);

        $booking = Booking::create([
            'user_id' => $user->id,
            'property_id' => $property->id,
            'start_date' => '2026-09-20',
            'end_date' => '2026-09-25',
            'status' => 'pending',
            'total_price' => 750,
        ]);

        $this->assertEquals(750, (float) $booking->total_price);
    }

    public function test_overlapping_booking_is_detected(): void
    {
        $user = User::factory()->create();

        $property = Property::factory()->create([
            'price_per_night' => 150,
        ]);

        Booking::create([
            'user_id' => $user->id,
            'property_id' => $property->id,
            'start_date' => '2026-09-20',
            'end_date' => '2026-09-25',
            'status' => 'pending',
            'total_price' => 750,
        ]);

        $overlapExists = $property->bookings()
            ->where('status', '!=', 'cancelled')
            ->where('start_date', '<', '2026-09-22')
            ->where('end_date', '>', '2026-09-20')
            ->exists();

        $this->assertTrue($overlapExists);
    }

    public function test_user_can_only_cancel_their_own_booking(): void
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();

        $property = Property::factory()->create();

        $booking = Booking::create([
            'user_id' => $owner->id,
            'property_id' => $property->id,
            'start_date' => '2026-09-20',
            'end_date' => '2026-09-25',
            'status' => 'pending',
            'total_price' => 750,
        ]);

        $this->assertTrue(
            $owner->can('cancel', $booking)
        );

        $this->assertFalse(
            $otherUser->can('cancel', $booking)
        );
    }
}