<?php

namespace App\Actions;

use App\Models\Booking;
use App\Traits\HasCreateUser;

class CreateBooking
{
    use HasCreateUser;

    /**
     * Creates the booking.
     * 
     */
    public function create(array $data)
    {
        $user = $this->createUser($data);

        $booking = new Booking();

        $booking->booking_date = $data['booking_date'];
        $booking->flexibility_id = $data['flexibility'];
        $booking->vehicle_size_id = $data['vehicle_size'];
        $booking->contact_number = $data['contact_number'];
        $booking->user_id = $user->id;
        
        $booking->save();

        return $booking;
    }
}