<?php

namespace App\Contracts\Repositories;

use App\Models\VehicleSize;

interface VehicleSizeRepositoryInterface
{
    /**
     * Finds all of the vehicle size.
     * 
     */
    public function findAll();

    /**
     * Find a specific vehicle size
     * 
     * @param string $uuid
     * 
     * @return VehicleSize
     */
    public function findById(string $uuid) : VehicleSize;

}