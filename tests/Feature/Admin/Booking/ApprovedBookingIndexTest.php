<?php

namespace Tests\Feature\Admin\Booking;

use App\Models\ApprovedBooking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApprovedBookingsIndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_cannot_be_accessed_by_a_guest()
    {
        $this->get(route('admin.booking.approved'))
            ->assertRedirect(route('admin.login'));
    }

    /** @test */
    public function it_cannot_be_accessed_by_a_non_admin_user()
    {
        $this->asNonAdmin()
            ->get(route('admin.booking.approved'))
            ->assertRedirect(route('admin.login'));
    }

    /** @test */
    public function it_can_be_accessed_and_loads_the_correct_view()
    {
        $this->asAdmin()
            ->get(route('admin.booking.approved'))
            ->assertViewIs('admin.booking.approved')
            ->assertOk();
    }

    /** @test */
    public function it_loads_all_bookings_in_the_system()
    {
        ApprovedBooking::factory(10)->create();

        $approvedBookings = $this->asAdmin()
            ->get(route('admin.booking.approved'))
            ->viewData('approved_bookings');

        expect($approvedBookings)
            ->toHaveCount(10)
            ->each->toBeInstanceOf(ApprovedBooking::class);
    }
}
