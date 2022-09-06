<?php

namespace App\Controller\Auth;

use App\Model\Auth;
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
        $data = $this->request()->getInput();

        $valid = $this->validate($data, [
            'name' => 'required|text',
            'email' => 'required|email|unique:Auth,email',
            'password' => 'required|min:3|max:12|matches:password_confirm',
            'password_confirm' => 'required',
        ]);

        if ($valid !== true) {
            return back()->route('register', [
                'err' =>  $valid,
                'data' => $data,
            ]);
        } else {

            session()->remove('renderView');
            session()->remove('reserveRoute');

            $data->rol_id = 2;
            // dd($data);

            Auth::create($data);

            return redirect()->route('login');
        }
    }
}
