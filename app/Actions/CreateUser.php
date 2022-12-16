<?php

namespace App\Actions;

use App\Models\User;

class CreateUser
{
    /**
     * Creates the user.
     * 
     */
    public function create(array $data)
    {
        $user = User::whereEmail($data['email'])->first();

        // @todo - possibly refactor to use updateOrCreate()?
        if ($user) {

            $user->update([
                'name' => $data['name']
            ]);

            return $user;
        }

        $user = new User();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        
        $user->save();

        return $user;
    }
}