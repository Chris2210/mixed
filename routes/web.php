<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthOneController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthOneController::class, 'index'])->name('login');
Route::post('post-login', [AuthOneController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthOneController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthOneController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('logout', [AuthOneController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {


    //Listado Usuarios
    Route::get('/usuarios', [App\Http\Controllers\UsuariosController::class, 'index'])->name('usuarios');
    Route::get('/usuarios/show/{id}', [App\Http\Controllers\UsuariosController::class, 'show'])->name('usuarios.show');
    Route::get('/usuarios/showpatient/{id}', [App\Http\Controllers\UsuariosController::class, 'showpatient'])->name('usuarios.showpatient');
    Route::get('/usuarios/showphotos/{id}', [App\Http\Controllers\UsuariosController::class, 'showphotos'])->name('usuarios.showphotos');
    Route::get('/usuarios/create', [App\Http\Controllers\UsuariosController::class, 'create'])->name('usuarios.create');
    Route::get('/usuarios/statusOK/{id}', [App\Http\Controllers\UsuariosController::class, 'statusOK'])->name('usuarios.statusOK');
    Route::get('/usuarios/statusKO/{id}', [App\Http\Controllers\UsuariosController::class, 'statusKO'])->name('usuarios.statusKO');
    Route::post('/usuarios/update', [App\Http\Controllers\UsuariosController::class, 'update'])->name('usuarios.update');
    Route::get('/usuariosteam/{team}', [App\Http\Controllers\UsuariosController::class, 'usuariosteam'])->name('usuariosteam');
    Route::get('/usuarios/createuser', [App\Http\Controllers\UsuariosController::class, 'createuser'])->name('usuarios.createuser');
    Route::post('/usuarios/storeuser', [App\Http\Controllers\UsuariosController::class, 'storeuser'])->name('usuarios.storeuser');
    Route::get('/usuarios/statususerOK/{id}', [App\Http\Controllers\UsuariosController::class, 'statususerOK'])->name('usuarios.statususerOK');
    Route::get('/usuarios/statususerKO/{id}', [App\Http\Controllers\UsuariosController::class, 'statususerKO'])->name('usuarios.statususerKO');
    Route::get('/usuarios/createoperation/{id}', [App\Http\Controllers\UsuariosController::class, 'createoperation'])->name('usuarios.createoperation');
    Route::post('/usuarios/storeoperation', [App\Http\Controllers\UsuariosController::class, 'storeoperation'])->name('usuarios.storeoperation');
     Route::post('/usuarios/editphoto', [App\Http\Controllers\UsuariosController::class, 'editphoto'])->name('usuarios.editphoto');

    //Listado Teams
    Route::get('/teams', [App\Http\Controllers\TeamsController::class, 'index'])->name('teams');
    Route::get('/teams/create', [App\Http\Controllers\TeamsController::class, 'create'])->name('teams.create');
    Route::get('/teams/show/{id}', [App\Http\Controllers\TeamsController::class, 'show'])->name('teams.show');
    Route::get('/teams/statusOK/{id}', [App\Http\Controllers\TeamsController::class, 'statusOK'])->name('teams.statusOK');
    Route::get('/teams/statusKO/{id}', [App\Http\Controllers\TeamsController::class, 'statusKO'])->name('teams.statusKO');
    Route::post('/teams/store', [App\Http\Controllers\TeamsController::class, 'store'])->name('teams.store');
    Route::post('/teams/update', [App\Http\Controllers\TeamsController::class, 'update'])->name('teams.update');

});


