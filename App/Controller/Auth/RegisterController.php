<?php

namespace App\Controller\Auth;

use System\Controller;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auth/register');
    }

    public function store()
    {
    }
}
