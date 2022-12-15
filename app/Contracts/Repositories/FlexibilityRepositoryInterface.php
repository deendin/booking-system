<?php

namespace App\Contracts\Repositories;

use App\Models\Flexibility;

interface FlexibilityRepositoryInterface
{
    /**
     * Finds all vehicle sizes.
     * 
     */
    public function findAll();

    /**
     * Find a specific flixibility
     * 
     * @param string $uuid
     * 
     * @return Flexibility
     */
    public function findById(string $uuid) : Flexibility;

}