<?php

namespace App\Contracts\Repositories;

use App\Models\Booking;

interface BookingRepositoryInterface
{
    /**
     * Finds all of the bookings.
     * 
     */
    public function findAll();

    /**
     * Find a specific booking
     * 
     * @param string $uuid
     * 
     * @return Booking
     */
    public function findById(string $uuid) : Booking;

}