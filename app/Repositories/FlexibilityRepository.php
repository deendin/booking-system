<?php

namespace App\Repositories;

use App\Contracts\Repositories\FlexibilityRepositoryInterface as Contract;
use App\Models\Flexibility;

class FlexibilityRepository implements Contract
{
    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        return Flexibility::latest()->get();
    }

    /**
     * {@inheritdoc}
     */
    public function findById(string $uuid) : Flexibility
    {
        return Flexibility::where('uuid', $uuid)->first();
    }
}