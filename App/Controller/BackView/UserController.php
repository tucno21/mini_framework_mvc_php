<?php

namespace App\Controller\BackView;

use System\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        //ejecutar para proteger la rutas cuando inicia sesion
        //enviar la sesion y el parametro principal de la url
        $this->middleware(auth()->user(), ['/users']);
    }

    public function index()
    {
        return view('users.index', [
            'var' => 'es una variable',
        ]);
    }

    public function create()
    {
        $data = $this->request()->getInput();
        //return view('folder/file', [
        //   'var' => 'es una variable',
        //]);
    }

    public function store()
    {
        $data = $this->request()->getInput();
        //return redirect()->route('nameRoute');
    }

    public function edit()
    {
        //return view('folder/file', [
        //   'var' => 'es una variable',
        //]);
    }

    public function update()
    {
        $data = $this->request()->getInput();
        //return redirect()->route('nameRoute');
    }

    public function destroy()
    {
        $data = $this->request()->getInput();
        // return redirect()->route('nameRoute');
    }
}
