<?php

use System\Route;
use App\Controller\Auth\AuthController;
use App\Controller\Auth\RegisterController;
use App\Controller\BackView\UserController;
use App\Controller\FrontView\HomeController;
use App\Controller\BackView\ProductoController;
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

//usuarios
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/create', [UserController::class, 'store']);
Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/edit', [UserController::class, 'update']);
Route::get('/users/destroy', [UserController::class, 'destroy'])->name('users.destroy');

//productos
Route::get('/products', [ProductoController::class, 'index'])->name('products');
Route::get('/products/create', [ProductoController::class, 'create'])->name('products.create');
Route::post('/products/create', [ProductoController::class, 'store']);
Route::get('/products/edit', [ProductoController::class, 'edit'])->name('products.edit');
Route::post('/products/edit', [ProductoController::class, 'update']);
Route::get('/products/destroy', [ProductoController::class, 'destroy'])->name('products.destroy');
