<?php

namespace App\Actions;

use App\Models\Booking;

class DeleteBooking
{

    /**
     * Deletes the booking.
     * 
     */
    public function delete(Booking $booking)
    {
        return $booking->delete();
    }
}