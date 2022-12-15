<?php

namespace App\Actions;

use App\Models\Booking;

class UpdateBooking
{
    /**
     * Updates the booking.
     * 
     */
    public function update(Booking $booking, array $data)
    {
        if ( isset($data['name']) ) {

            $booking->user->forceFill([
                'name' => $data['name']
            ]);

        }

        if ( isset($data['email_address']) ) {

            $booking->user->forceFill([
                'email' => $data['email_address']
            ]);

        }

        if ( isset($data['booking_date']) ) {
            $booking->forceFill([
                'booking_date' => $data['booking_date']
            ]);
        }

        if ( isset($data['flexibility']) ) {
            $booking->forceFill([
                'flexibility_id' => $data['flexibility']
            ]);
        }

        if ( isset($data['vehicle_size']) ) {
            $booking->forceFill([
                'vehicle_size_id' => $data['vehicle_size']
            ]);
        }

        if ( isset($data['contact_number']) ) {
            $booking->forceFill([
                'contact_number' => $data['contact_number']
            ]);
        }
        // dd($booking, $booking->user);
        $booking->save();

        $booking->user->save();
        
        return $booking;
    }
}