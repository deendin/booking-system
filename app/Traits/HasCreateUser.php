<?php

namespace App\Traits;

use App\Actions\CreateUser;
use App\Models\User;

trait HasCreateUser
{
    public function createUser(array $data) : User
    {
        $user = app(CreateUser::class)->create([
            'name' => $data['name'],
            'email' => $data['email_address'],
        ]);

        return $user;
    }
}