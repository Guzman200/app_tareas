<?php

use App\Http\Controllers\Autenticacion\InicioSesionController;
use Illuminate\Support\Facades\Route;


Route::post('login', [InicioSesionController::class, 'login']);

/** ============> ENDPOINTS CON AUTENTICACION <============================= */
Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::post('logout', [InicioSesionController::class, 'logout']);

});