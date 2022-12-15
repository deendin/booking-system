<?php

namespace App\Repositories;

use App\Contracts\Repositories\ApprovedBookingRepositoryInterface as Contract;
use App\Models\ApprovedBooking;

class ApprovedBookingRepository implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return ApprovedBooking::latest()->get();
    }

    /**
     * {@inheritdoc}
     */
    public function findById(string $uuid) : ApprovedBooking
    {
        return ApprovedBooking::where('uuid', $uuid)->first();
    }
}