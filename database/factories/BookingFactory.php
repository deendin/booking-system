<?php

namespace Database\Factories;

use App\Models\Flexibility;
use App\Models\User;
use App\Models\VehicleSize;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'flexibility_id' => Flexibility::where('name', fake()->randomElement([
                '+/- 1 Day',
                '+/- 2 Days',
                '+/- 3 Days',
            ]))->first() ?? Flexibility::factory(),  //@todo - this works but needs to be refactored to handle this with state/sequence?
            'vehicle_size_id' => VehicleSize::where('name', fake()->randomElement([
                'Small',
                'Medium',
                'Large',
                'Van',
            ]))->first() ?? VehicleSize::factory(), //@todo - refactor ro handle this with factory state/sequence?
            'booking_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'contact_number' => $this->faker->phoneNumber(),
        ];
    }
}
