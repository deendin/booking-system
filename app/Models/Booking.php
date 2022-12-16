<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, HasUuid, SoftDeletes;

    protected $casts = [
        'booking_date' => 'datetime',
    ];

    /**
     * Returns the associated flexibility
     * 
     */
    public function flexibility() : BelongsTo
    {

        return $this->belongsTo(Flexibility::class);
    }

    /**
     * Returns the associated vehicle size.
     * 
     */
    public function vehicle_size() : BelongsTo
    {
        return $this->belongsTo(VehicleSize::class);
    }

    /**
     * Returns the associated user/owner.
     * 
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns the associated status of the booking.
     * 
     * Approval model
     */
    public function approved() : HasOne
    {
        return $this->hasOne(ApprovedBooking::class);
    }
}
