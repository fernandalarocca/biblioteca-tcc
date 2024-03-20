<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
    public function execute(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::make($data);
        $user->save();
        return $user;
    }
}
