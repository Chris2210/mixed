<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersApiController;
use App\Http\Controllers\Api\DatosController;
use App\Http\Controllers\Api\FotosController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [UsersApiController::class, 'register'])->name('users.register');
Route::post('/login', [UsersApiController::class, 'login'])->name('users.login');
Route::post('/recovery', [UsersApiController::class, 'recovery'])->name('users.recovery');
Route::post('/change', [UsersApiController::class, 'change'])->name('users.change');
Route::post('/changePassword', [UsersApiController::class, 'changePassword'])->name('users.changePassword');

Route::get('/operations/{id}', [DatosController::class, 'operations'])->name('datos.operations');
Route::get('/activeoperations/{id}', [DatosController::class, 'activeoperations'])->name('datos.activeoperations');

Route::get('/crearFoto/{id}/{team}/{user}', [DatosController::class, 'crearFoto'])->name('datos.crearFoto');
Route::get('/recuperarFoto/{id}', [DatosController::class, 'recuperarFoto'])->name('datos.recuperarFoto');
Route::get('/showPhoto/{id}', [DatosController::class, 'showPhoto'])->name('datos.showPhoto');
Route::get('/deletephoto/{id}', [DatosController::class, 'deletephoto'])->name('datos.deletephoto');
Route::get('/deleteNew/{id}/{team}/{user}', [DatosController::class, 'deleteNew'])->name('datos.deleteNew');
Route::get('/enviarPhoto/{id}', [DatosController::class, 'enviarPhoto'])->name('datos.enviarPhoto');
Route::get('/lastPhoto/{id}/{team}/{user}', [DatosController::class, 'lastPhoto'])->name('datos.lastPhoto');
Route::get('/photosList/{id}', [DatosController::class, 'photosList'])->name('datos.photosList');
Route::get('/editPhoto/{id}', [DatosController::class, 'editPhoto'])->name('datos.editPhoto');
Route::get('/verUltimaFoto/{id}/{team}/{user}', [DatosController::class, 'verUltimaFoto'])->name('datos.verUltimaFoto');

Route::post('/heathOne', [DatosController::class, 'heathOne'])->name('datos.heathOne');
Route::post('/heathTwo', [DatosController::class, 'heathTwo'])->name('datos.heathTwo');
Route::post('/heathThree', [DatosController::class, 'heathThree'])->name('datos.heathThree');
Route::post('/heathFour', [DatosController::class, 'heathFour'])->name('datos.heathFour');
Route::post('/heathFive', [DatosController::class, 'heathFive'])->name('datos.heathFive');
Route::post('/heathSix', [DatosController::class, 'heathSix'])->name('datos.heathSix');
Route::post('/datos/upload', [DatosController::class, 'upload'])->name('datos.upload');




