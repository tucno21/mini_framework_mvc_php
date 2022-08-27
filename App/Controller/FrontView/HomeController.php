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

        $bool = false;

        if ($bool) {
            return redirect()->back()->with('message', 'hola mundo');
        } else {
            return view('home/index', [
                // 'data' => $data,
            ]);
        }
    }
}
