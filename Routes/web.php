<?php

use System\Route;
use App\Controller\Auth\AuthController;
use App\Controller\FrontView\HomeController;

/**
 * cargar el autoloader de composer Y la configuracion de la aplicacion
 */
require_once dirname(__DIR__) . '/System/Autoload.php';

//  FrontView
Route::get('/', [HomeController::class, 'index'])->name('home');

// autenticacion
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
