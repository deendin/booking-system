<?php

namespace Tests\Feature\Admin\Booking;

use App\Models\ApprovedBooking;
use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApprovedBookingStoreTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_approve_a_booking()
    {
        $booking = Booking::factory()->create();

        $this->asAdmin()
            ->get(route('admin.booking.approve_booking', $booking->uuid))
            ->assertRedirect(route('admin.booking.index'));

        // We now have the approved booking info saved in the db, let's check if its actually there.
        $this->assertTrue(ApprovedBooking::whereBookingId($booking->id)->exists());
    }
}
