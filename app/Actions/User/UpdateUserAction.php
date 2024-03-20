<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateUserAction
{
    public function execute(array $data, User $user): User
    {
        if($password = data_get($data, 'password')){
            $data['password'] = Hash::make($password);
        }

        $user->update($data);
        return $user;
    }
}
