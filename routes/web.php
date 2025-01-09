<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\HistorialMedicoController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\EstadisticasController;

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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});*/

Route::get('/', function () {
    return view('home');
})->name('home');

//Route::resource('pacientes', PacienteController::class);
Route::resource('pacientes', App\Http\Controllers\PacienteController::class);
Route::resource('medicos', MedicoController::class);
Route::resource('citas', CitaController::class);
Route::resource('historiales', HistorialMedicoController::class);
Route::resource('notificaciones', NotificacionController::class);
Route::resource('estadisticas', EstadisticasController::class);


