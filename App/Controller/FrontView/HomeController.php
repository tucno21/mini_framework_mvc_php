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


        // session()->set('home', $data);
        // session()->set('user', $data);

        // d(session()->get('user'));
        d(session()->all());

        // session()->remove('user');
        // session()->flush();


        return view('home/index', [
            'data' => $data,
        ]);
    }
}
