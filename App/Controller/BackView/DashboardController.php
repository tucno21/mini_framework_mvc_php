<?php

namespace App\Controller\BackView;

use System\Controller;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard/index', [
            'titulo' => 'Dashboard roles',
        ]);
    }
}
