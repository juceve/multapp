<?php

use App\Http\Controllers\CasetaController;
use App\Http\Controllers\CausaleController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SancioneController;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\TipopagoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VinculoController;
use App\Http\Livewire\CobroSanciones;
use App\Http\Livewire\Rptsanciones;
use App\Http\Livewire\Sancionar;
use App\Http\Livewire\SancionesListado;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/users/profile/{user}', [UserController::class, 'profile'])->name('users.profile');
    Route::get('users/asignaRol/{user}', [UserController::class, 'asinaRol'])->name('users.asignaRol');
    Route::put('users/updateRol/{user}', [UserController::class, 'updateRol'])->name('users.updateRol');
    Route::get('users/cambiaestado/{user}', [UserController::class, 'cambiaestado'])->name('users.cambiaestado');

    Route::resource('admin/usuarios', UserController::class)->names('users');
    Route::resource('admin/roles', RoleController::class)->names('admin.roles');
    Route::resource('admin/socios', SocioController::class)->names('socios');
    Route::resource('admin/casetas', CasetaController::class)->names('casetas');
    Route::resource('admin/vinculos', VinculoController::class)->names('vinculos');
    Route::resource('admin/causales', CausaleController::class)->names('causales');
    Route::resource('admin/sanciones', SancioneController::class)->names('sanciones');
    Route::resource('admin/tipopagos', TipopagoController::class)->names('tipopagos');
    Route::resource('admin/pagos', PagoController::class)->names('pagos');
    Route::resource('admin/sistemas', SistemaController::class)->names('sistemas');

    Route::get('admin/sancionar', Sancionar::class)->name('sancionar');
    Route::get('admin/cobros/sanciones', CobroSanciones::class)->name('cobrosanciones');
    Route::get('pdf/boleta/{data}', [PdfController::class, 'boleta'])->name('pdf.boleta');

    Route::get('admin/reportes/sanciones', Rptsanciones::class)->name('reportes.sanciones');
});
