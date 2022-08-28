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
}
