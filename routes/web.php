<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;

Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

/* Cliente Rutas */

Route::get('/clientes', [ClientController::class, 'index'])->name('admin.clients.index');
Route::post('/clientes', [ClientController::class, 'store'])->name('admin.clients.store');
Route::get('/clientes/buscar/{tipo}/{numero}', [ClientController::class, 'buscar']);
