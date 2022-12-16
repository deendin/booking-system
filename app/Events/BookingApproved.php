<?php

namespace App\Events;

use App\Models\ApprovedBooking;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BookingApproved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public readonly ApprovedBooking $approvedBooking
    )
    {
    }
}
