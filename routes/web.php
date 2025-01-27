<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\HistorialMedicoController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Dashboard principal
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Rutas de recursos
    Route::resource('pacientes', PacienteController::class);
    Route::resource('medicos', MedicoController::class);
    Route::resource('citas', CitaController::class);
    Route::resource('historiales', HistorialMedicoController::class);
    Route::resource('notificaciones', NotificacionController::class);
    Route::resource('estadisticas', EstadisticasController::class);
});

// Rutas de autenticación
require __DIR__ . '/auth.php';

