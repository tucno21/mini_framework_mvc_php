<?php

namespace App\Controller\Auth;

use App\Model\Auth;
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
            return back()->route('login', [
                'err' =>  $valid,
                'data' => $data,
            ]);
        } else {
            // $user = Auth::select('id, email, name')->where('email', $data->email)->get();

            $user = Auth::select('users.id', 'users.email', 'users.name', 'users.status', 'users.rol_id', 'roles.rol_name')
                ->join('roles', 'users.rol_id', '=', 'roles.id')
                ->get();

            if ($user->status == 0) {
                session()->flash('status', 'Usuario desactivado');
                return back()->route('login');
            }

            auth()->attempt($user);

            return redirect()->route('dashboard');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
