<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/tarea', [TareaController::class, 'crearTarea']);
Route::get('/tarea', [TareaController::class, 'listarTareas']);
Route::get('/tarea/{id}', [TareaController::class, 'buscarTarea']);
Route::get('/tarea/{titulo}', [TareaController::class, 'buscarTareaPorTitulo']);
Route::get('/tarea/{estado}', [TareaController::class, 'buscarTareaPorEstado']);
Route::get('/tarea/{autor}', [TareaController::class, 'buscarTareaPorAutor']);

