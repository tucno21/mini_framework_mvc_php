<?php

namespace App\Controller\BackView;

use System\Controller;
use App\Model\Permissions;

class RolesPermissionController extends Controller
{
    public function __construct()
    {
        //ejecutar para proteger la rutas cuando inicia sesion
        //enviar la sesion y el parametro principal de la url
        $this->middleware(auth()->user(), ['/roles']);
    }

    public function edit()
    {
        $data = $this->request()->getInput();

        $permisosRol = Permissions::permisosRol((int)$data->id);

        //cuando viene un solo objeto
        if (is_object($permisosRol)) {
            $permisosRol = [$permisosRol];
        }

        $permissions = Permissions::select('id', 'per_name', 'description')->get();

        // array_key($permissions, 'id', 'per_name');


        // dd(in_array('dashboard', array_column($permisosRol, 'per_name')));

        return view('roles.permission', [
            'titulo' => 'control de permisos',
            'permissions' => $permissions,
            'permisosRol' => $permisosRol,
            'id' => $data->id,
        ]);
    }

    public function update()
    {
        $data = $this->request()->getInput();

        $permisos = $data;
        $permisos = array_filter((array)$permisos, function ($key) {
            return $key !== 'rol_id';
        }, ARRAY_FILTER_USE_KEY);

        Permissions::sync((int)$data->rol_id, $permisos);

        return redirect()->route('roles');
    }
}
