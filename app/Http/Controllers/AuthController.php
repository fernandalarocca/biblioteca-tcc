<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'username' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    public function showLogin()
    {
        $credentials = ['email' => 'admin@email.com', 'password' => '12345678'];

        Auth::attempt($credentials);
        return view("auth.login-form");
    }
}
