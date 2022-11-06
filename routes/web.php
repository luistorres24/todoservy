<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/administrador', function () {
    return view('administrador');
});

Route::get('/listado-negocios', function () {
    return view('listado_negocios');
});

Route::get('/traer-negocios', [\App\Http\Controllers\NegociosController::class, 'traerNegocios']);
Route::post('/crear-negocio', [\App\Http\Controllers\NegociosController::class, 'crearNegocio']);
Route::post('/editar-negocio/{negocio}', [\App\Http\Controllers\NegociosController::class, 'editarNegocio']);
Route::delete('/eliminar-negocio/{negocio}', [\App\Http\Controllers\NegociosController::class, 'eliminarNegocio']);
Route::get('/negocio/{negocio}', [\App\Http\Controllers\NegociosController::class, 'mostrarNegocio']);
Route::get('/traer-calificacion-negocio', [\App\Http\Controllers\NegociosController::class, 'traerCalificacion']);
Route::post('/crear-calificacion-negocio', [\App\Http\Controllers\NegociosController::class, 'crearCalificacion']);
