<?php

namespace App\Contracts\Repositories;

use App\Models\ApprovedBooking;

interface ApprovedBookingRepositoryInterface
{
    /**
     * Finds all of the approved bookings.
     * 
     */
    public function findAll();

    /**
     * Find a specific booking
     * 
     * @param string $uuid
     * 
     * @return ApprovedBooking
     */
    public function findById(string $uuid) : ApprovedBooking;

}