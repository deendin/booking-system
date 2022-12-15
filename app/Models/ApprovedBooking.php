<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovedBooking extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['booking_id', 'approved_by'];

    /**
     * Returns the associated shipper
     * 
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
