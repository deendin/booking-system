<?php

namespace Tests\Feature\Admin\Booking;

use App\Models\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingIndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_cannot_be_accessed_by_a_guest()
    {
        $this->get(route('admin.booking.index'))
            ->assertRedirect(route('admin.login'));
    }

    /** @test */
    public function it_cannot_be_accessed_by_a_non_admin_user()
    {
        $this->asNonAdmin()
            ->get(route('admin.booking.index'))
            ->assertRedirect(route('admin.login'));
    }

    /** @test */
    public function it_can_be_accessed_and_loads_the_correct_view()
    {
        $this->asAdmin()
            ->get(route('admin.booking.index'))
            ->assertViewIs('admin.booking.index')
            ->assertOk();
    }

    /** @test */
    public function it_loads_all_bookings_in_the_system()
    {
        Booking::factory(3)->create();

        $bookings = $this->asAdmin()
            ->get(route('admin.booking.index'))
            ->viewData('bookings');

        expect($bookings)
            ->toHaveCount(3)
            ->each->toBeInstanceOf(Booking::class);
    }
}
