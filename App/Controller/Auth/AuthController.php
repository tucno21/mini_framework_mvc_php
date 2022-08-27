<?php

namespace App\Controller\Auth;

use System\Controller;


class AuthController extends Controller
{
    public function login()
    {
        // $data = [
        //     'title' => 'login',
        //     'description' => 'login de la web',
        // ];

        return view('auth/login', [
            // 'data' => $data,
        ]);
    }

    public function register()
    {
    }
}
