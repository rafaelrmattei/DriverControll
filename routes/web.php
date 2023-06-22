<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',                                 [AuthController::class, 'index'])->name('login');
Route::post('/login',                           [AuthController::class, 'login'])->name('login.action');

Route::middleware(['auth'])->group(function(){

    Route::get('/logout',                       [AuthController::class, 'logout'])->name('logout');

    Route::get('/rotas',                        [RouteController::class, 'index'])->name('routes');
    Route::get('/rotas/nova',                   [RouteController::class, 'create'])->name('routes.create');
    Route::post('/rotas/grava',                 [RouteController::class, 'store'])->name('routes.store');

    Route::middleware(['auth','role:admin'])->group(function(){

        Route::get('/rotas/exclui/{id}',        [RouteController::class, 'destroy'])->name('routes.destroy');

        Route::get('/veiculos',                 [VehicleController::class, 'index'])->name('vehicles');
        Route::get('/veiculos/novo',            [VehicleController::class, 'create'])->name('vehicles.create');
        Route::post('/veiculos/grava',          [VehicleController::class, 'store'])->name('vehicles.store');
        Route::get('/veiculos/edita/{id}',      [VehicleController::class, 'edit'])->name('vehicles.edit');
        Route::post('/veiculos/atualiza',       [VehicleController::class, 'update'])->name('vehicles.update');
        Route::get('/veiculos/exclui/{id}',     [VehicleController::class, 'destroy'])->name('vehicles.destroy');

        Route::get('/motoristas',               [DriverController::class, 'index'])->name('drivers');
        Route::get('/motoristas/novo',          [DriverController::class, 'create'])->name('drivers.create');
        Route::post('/motoristas/grava',        [DriverController::class, 'store'])->name('drivers.store');
        Route::get('/motoristas/edita/{id}',    [DriverController::class, 'edit'])->name('drivers.edit');
        Route::post('/motoristas/atualiza',     [DriverController::class, 'update'])->name('drivers.update');
        Route::get('/motoristas/exclui/{id}',   [DriverController::class, 'destroy'])->name('drivers.destroy');

        Route::get('/municipios',               [CityController::class, 'index'])->name('cities');
        Route::get('/municipios/novo',          [CityController::class, 'create'])->name('cities.create');
        Route::post('/municipios/grava',        [CityController::class, 'store'])->name('cities.store');
        Route::get('/municipios/edita/{id}',    [CityController::class, 'edit'])->name('cities.edit');
        Route::post('/municipios/atualiza',     [CityController::class, 'update'])->name('cities.update');
        Route::get('/municipios/exclui/{id}',   [CityController::class, 'destroy'])->name('cities.destroy');

    });
    
});
