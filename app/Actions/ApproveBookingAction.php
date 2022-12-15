<?php

namespace App\Actions;

use App\Models\ApprovedBooking;
use App\Models\Booking;

class ApproveBookingAction
{
    /**
     * Approves the booking.
     * 
     */
    public function approve(Booking $booking)
    {

        $approvedBooking = ApprovedBooking::updateOrCreate(
            ['booking_id' => $booking->id],
            ['approved_by' => auth()->user()->id]
        );

        return $approvedBooking;
    }
}