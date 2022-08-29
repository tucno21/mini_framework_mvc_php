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
        // $product = Productos::all();
        $product = Productos::select('productos.*', 'users.name')
            ->join('users', 'productos.user_id', '=', 'users.id')
            ->get();

        //cuando viene un solo objeto
        if (is_object($product)) {
            $product = [$product];
        }

        return view('dashboard/index', [
            'title' => 'Dashboard',
            'product' => $product
        ]);
    }

    public function create()
    {
        return view('dashboard/create', [
            'title' => 'crear productos',
        ]);
    }

    public function store()
    {
        $data = $this->request()->getInput();

        $valid = $this->validate($data, [
            'producto' => 'required',
            'descripcion' => 'required|text',
            'precio' => 'required',
            'user_id' => 'required'
        ]);

        if ($valid !== true) {
            return back()->route('dashboard.create', [
                'err' =>  $valid,
                'data' => $data,
            ]);
        } else {

            session()->remove('renderView');
            session()->remove('reserveRoute');

            Productos::create($data);

            return redirect()->route('dashboard');
        }
    }

    public function edit()
    {
        $id = $this->request()->getInput();

        if (empty((array)$id)) {
            $product = null;
        } else {
            $product = Productos::first($id->id);
        }

        return view('dashboard/edit', [
            'title' => 'editar productos',
            'data' => $product
        ]);
    }

    public function update()
    {
        $data = $this->request()->getInput();


        $valid = $this->validate($data, [
            'producto' => 'required',
            'descripcion' => 'required|text',
            'precio' => 'required',
            'user_id' => 'required',
            'id' => 'required'
        ]);

        if ($valid !== true) {
            return back()->route('dashboard.edit', [
                'err' =>  $valid,
                'data' => $data,
            ]);
        } else {
            // dd($data);
            session()->remove('renderView');
            session()->remove('reserveRoute');

            Productos::update($data->id, $data);

            return redirect()->route('dashboard');
        }
    }

    public function destroy()
    {
        $data = $this->request()->getInput();
        // dd((int)$data->id);
        $result = Productos::delete((int)$data->id);
        // dd($result);
        return redirect()->route('dashboard');
    }
}
