<?php

namespace App\Controller\FrontView;

use System\Controller;

/**
 * controlador de la web
 */
class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'home',
            'description' => 'publicaciones de la web',
        ];

        // return view('home/index', [
        //     'data' => $data,
        // ]);

        return redirect()->route('login', [
            'data' => $data,
        ]);
    }
}
