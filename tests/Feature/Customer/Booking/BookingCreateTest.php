<?php

namespace Tests\Feature\Customer\Booking;

use App\Models\Booking;
use App\Models\Flexibility;
use App\Models\User;
use App\Models\VehicleSize;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingCreateTest extends TestCase
{
    use RefreshDatabase;

    private function bookingData()
    {
        return [
            'name' => 'Somto Bachs',
            'booking_date' => '2018-04-19',
            'flexibility' => Flexibility::factory()->create(),
            'vehicle_size' => VehicleSize::factory()->create(),
            'contact_number' => '0128399228',
            'email_address' => 'somto@carsparklimited.com',
        ];
    }

    /** @test */
    public function a_customer_can_create_a_booking()
    {
        $this->asNonAdmin()
            ->post(route('booking.store', $this->bookingData()))
            ->assertRedirect(route('booking.index'));

        // We now have the user info saved in the db, let's check if its actually there.
        $this->assertTrue(User::whereEmail('somto@carsparklimited.com')->exists());
        $this->assertTrue(Booking::whereContactNumber('0128399228')->exists());
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
