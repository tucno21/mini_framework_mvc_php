<?php

// DATOS GENERALES ADMIN
$title = 'ROLES';
$titleShort = 'R';
$mainLink = base_url('/dashboard');
$logoAdmin = '../public/logo/logo.png';

//DATOS DEL USUARIO ADMIN
$userName = session()->user()->name;



//MENU CERRAR O PERFIL DE ADMINISTRADOR
$menuSession = [
    [
        'text' => 'Logout',
        'url'  => route('logout'),
        'icon' => 'bi bi-box-arrow-right',
    ],
];



//CREACION DE ENLACES PARA EL MENU SIDEBAR
$linksSidebar = [
    [
        'mode' => 'menu',
        'text' => 'Dashboard',
        'url'  => '/',
        'icon' => 'bi bi-speedometer2',
    ],
    [
        'mode' => 'menu',
        'text' => 'Usuarios',
        'url'  => '/',
        'icon' => 'bi bi-person-lines-fill',
    ],
    [
        'mode' => 'menu',
        'text' => 'Productos',
        'url'  => '/users',
        'icon' => 'bi bi-shop',
    ],
];



//ENLACES PARA CSS Y JS html
$linkURL = base_url;

$linksCss = [
    $linkURL . '/assets/css/default/bootstrap.min.css',
    $linkURL . '/assets/css/default/app.min.css',
    $linkURL . '/assets/css/icon/bootstrap-icons.css',
];

$linksScript = [
    $linkURL . '/assets/js/vendor.min.js',
    $linkURL . '/assets/js/app.min.js',
];
