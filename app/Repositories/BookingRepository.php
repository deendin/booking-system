<?php

namespace App\Repositories;

use App\Contracts\Repositories\BookingRepositoryInterface as Contract;
use App\Models\Booking;

class BookingRepository implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return Booking::with('approved')->latest()->get();
    }

    /**
     * {@inheritdoc}
     */
    public function findById(string $uuid) : Booking
    {
        return Booking::where('uuid', $uuid)->first();
    }
}