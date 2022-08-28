<?php

namespace App\Controller\Auth;

use System\Controller;


class AuthController extends Controller
{
    public function index()
    {
        $login = [
            'title' => 'login',
            'description' => 'login de la web',
        ];

        return view('auth/login', [
            'title' => 'Login Mini Framework',
        ]);
    }

    public function store()
    {
        $data = $this->request()->getInput();

        $valid = $this->validate($data, [
            'email' => 'required|email|not_unique:Auth,email',
            'password' => 'required|password_verify:Auth,email',
        ]);

        if ($valid !== true) {
            return redirect()->route('login', [
                'err' =>  $valid,
                'data' => $data,
            ]);
        }
    }
}
