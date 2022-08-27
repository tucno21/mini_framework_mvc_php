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

        // session()->set('user', $data);

        session()->flash('message', 'hola mundo');

        // d(session()->get('user'));
        // d(session()->get('message'));

        d(session()->has('message'));

        // d(session()->all());

        // return view('home/index', [
        //     // 'data' => $data,
        // ]);

        return redirect()->route('login', [
            'data' => $data,
        ]);
    }
}
