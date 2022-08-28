<?php

use System\Route;
use App\Controller\Auth\AuthController;
use App\Controller\Auth\RegisterController;
use App\Controller\FrontView\HomeController;
use App\Controller\BackView\DashboardController;

/**
 * cargar el autoloader de composer Y la configuracion de la aplicacion
 */
require_once dirname(__DIR__) . '/System/Autoload.php';

//  FrontView
Route::get('/', [HomeController::class, 'index'])->name('home');

// autenticacion
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// BackView
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
