<?php

namespace App\Controller\BackView;

use System\Controller;


class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard/index', [
            'title' => 'Dashboard',
        ]);
    }
}
