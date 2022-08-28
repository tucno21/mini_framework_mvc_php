<?php

namespace App\Controller\Auth;

use System\Controller;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auth/register', [
            'title' => 'Register Mini Framework',
        ]);
    }

    public function store()
    {
    }
}
