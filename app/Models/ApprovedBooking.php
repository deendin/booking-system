<?php

namespace App\Models;

use App\Events\BookingApproved;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovedBooking extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['booking_id', 'approved_by'];

    /**
     * The event map for the model.
     * 
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => BookingApproved::class
    ];

    /**
     * Returns the associated shipper
     * 
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
