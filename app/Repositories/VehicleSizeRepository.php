<?php

namespace App\Repositories;

use App\Contracts\Repositories\VehicleSizeRepositoryInterface as Contract;
use App\Models\VehicleSize;

class VehicleSizeRepository implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return VehicleSize::latest()->get();
    }

    /**
     * {@inheritdoc}
     */
    public function findById(string $uuid) : VehicleSize
    {
        return VehicleSize::where('uuid', $uuid)->first();
    }
}