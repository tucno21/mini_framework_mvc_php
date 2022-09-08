<?php

// DATOS GENERALES ADMIN
$title = 'ROLES';
$titleShort = 'R';
$mainLink = base_url('/dashboard');
$logoAdmin = '../public/logo/logo.png';

//DATOS DEL USUARIO ADMIN
$userName = session()->user()->name;
// dd(session()->user());


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
    can('dashboard') ?
        [
            'mode' => 'menu',
            'text' => 'Dashboard',
            'url'  => route('dashboard'),
            'icon' => 'bi bi-speedometer2',
        ] : null,
    can('users') || can('roles') ?
        [
            'mode' => 'submenu',
            'text'    => 'Usuarios',
            'url'    => '#',
            'icon' => 'bi bi-person-lines-fill',
            'submenu' => [
                can('users') ?
                    [
                        'text' => 'Usuarios',
                        'url'  => route('users'),
                        'icon' => 'fas fa-circle',
                    ] : null,
                can('roles') ?
                    [
                        'text' => 'Roles',
                        'url'  => route('roles'),
                        'icon' => 'fas fa-circle',
                    ] : null,
                [
                    'text' => 'Permisos',
                    'url'  => route('permissions'),
                    'icon' => 'fas fa-circle',
                ],
            ],
        ] : null,
    can('products') ?
        [
            'mode' => 'menu',
            'text' => 'Productos',
            'url'  => route('products'),
            'icon' => 'bi bi-shop',
        ] : null,
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
