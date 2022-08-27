<?php

namespace App\Controller\Auth;

use System\Controller;


class AuthController extends Controller
{
    public function login()
    {
        $login = [
            'title' => 'login',
            'description' => 'login de la web',
        ];

        return view('auth/login', [
            'login' => $login,
        ]);
    }

    public function register()
    {
    }
}
