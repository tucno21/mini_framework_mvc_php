<?php

use System\Route;

/**
 * cargar el autoloader de composer Y la configuracion de la aplicacion
 */
require_once dirname(__DIR__) . '/System/Autoload.php';

//  FrontView
Route::get('/', [HomeController::class, 'index']);

// autenticacion
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'login']);

dd(Route::run());
