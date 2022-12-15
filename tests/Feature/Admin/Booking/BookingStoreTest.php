<?php

namespace Tests\Feature\Admin\Booking;

use App\Models\Booking;
use App\Models\Flexibility;
use App\Models\User;
use App\Models\VehicleSize;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingStoreTest extends TestCase
{
    use RefreshDatabase;

    private function bookingData()
    {
        return [
            'name' => 'Ashley Dangote',
            'booking_date' => '2022-01-12',
            'flexibility' => Flexibility::factory()->create(),
            'vehicle_size' => VehicleSize::factory()->create(),
            'contact_number' => '07022993382',
            'email_address' => 'ashley@dangote.com',
        ];
    }

    /** @test */
    public function an_admin_can_create_a_booking()
    {
        $this->asAdmin()
            ->post(route('booking.store', $this->bookingData()))
            ->assertRedirect(route('booking.index'));

        // We now have the user info saved in the db, let's check if its actually there.
        $this->assertTrue(User::whereEmail('ashley@dangote.com')->exists());
        $this->assertTrue(Booking::whereContactNumber('07022993382')->exists());
    }

    /** @test */
    public function name_is_required_to_create_a_booking()
    {
        $this->asAdmin()
            ->post(route('booking.store', []))
            ->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function booking_date_is_required_to_create_a_booking()
    {
        $this->asAdmin()
            ->post(route('booking.store', []))
            ->assertSessionHasErrors(['booking_date']);
    }

    /** @test */
    public function flexibility_is_required_to_create_a_booking()
    {
        $this->asAdmin()
            ->post(route('booking.store', []))
            ->assertSessionHasErrors(['flexibility']);
    }

    /** @test */
    public function vehicle_size_is_required_to_create_a_booking()
    {
        $this->asAdmin()
            ->post(route('booking.store', []))
            ->assertSessionHasErrors(['vehicle_size']);
    }

    /** @test */
    public function contact_number_is_required_to_create_a_booking()
    {
        $this->asAdmin()
            ->post(route('booking.store', []))
            ->assertSessionHasErrors(['contact_number']);
    }

    /** @test */
    public function email_address_is_required_to_create_a_booking()
    {
        $this->asAdmin()
            ->post(route('booking.store', []))
            ->assertSessionHasErrors(['email_address']);
    }
}
