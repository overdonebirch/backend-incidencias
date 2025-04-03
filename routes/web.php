<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidenciaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(IncidenciaController::class)->group(function () {
    Route::get('/incidencias','index');
    Route::get('/incidencias/jsonschema','getIncidenciaSchema');
    Route::get('/incidencias/{incidencia}','show');

    Route::post('/incidencias','store');
    Route::patch('/incidencias/{incidencia}','update');
    Route::delete('/incidencias/{incidencia}','destroy');
});