<?php

namespace App\Listeners;

use App\Mail\SendBookingApprovalMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendBookingApprovalMailNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $booking = $event->approvedBooking->booking;
        $user = $booking->user;

        Mail::to($user->email)
            ->queue(
                new SendBookingApprovalMail($booking, $user)
            );
    }
}
