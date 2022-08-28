<?php

namespace App\Controller\BackView;

use System\Controller;
use App\Model\Productos;


class DashboardController extends Controller
{
    public function __construct()
    {
        // enviar los datos de la sesion, y los parametros de la url para validar
        $this->middleware(auth()->user(), ['/dashboard']);
    }

    public function index()
    {
        $product = Productos::all();

        return view('dashboard/index', [
            'title' => 'Dashboard',
            'product' => $product
        ]);
    }

    public function create()
    {
        echo 'desde create';
        exit;
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
