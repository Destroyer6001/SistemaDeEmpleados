<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\EditController;
use App\http\Controllers\PuestoController;
use App\Http\Controllers\EmpleadoController;
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
    return view('home');
});
Route::get('/inicio',[InicioController::class, 'show'])->name('inicio.index')->middleware('auth');
Route::get('/login',[SessionController::class, 'show'])->name('login.index');
Route::get('/register',[RegisterController::class, 'show'])->name('register.index');
Route::post('/register',[RegisterController::class, 'register'])->name('register.submit');
Route::post('/login',[SessionController::class,'login'])->name('login.submit');
Route::get('/logout',[SessionController::class,'destroy'])->name('destroy.submit');
Route::get('/auth/{id}/edit',[EditController::class,'show'])->name('edit.index')->middleware('auth');
Route::patch('/auth/{id}',[EditController::class,'update'])->name('edit.update');
Route::get('/puestos',[PuestoController::class,'index'])->name('puestos.index')->middleware('auth');
Route::get('/puestos/create', [PuestoController::class,'create'])->name('puestos.create')->middleware('auth');
Route::post('/puestos',[PuestoController::class,'store'])->name('puestos.store');
Route::delete('/puestos/{id}',[PuestoController::class,'destroy'])->name('puestos.destroy');
Route::get('/puestos/{id}/edit',[PuestoController::class,'edit'])->name('puestos.edit')->middleware('auth');
Route::patch('/puestos/{id}', [PuestoController::class,'update'])->name('puestos.update');
Route::get('/empleados',[EmpleadoController::class,'index'])->name('empleados.index');
Route::get('/empleados/create',[EmpleadoController::class,'create'])->name('empleados.create');
Route::post('/empleados',[EmpleadoController::class,'store'])->name('empleados.store');
Route::delete('/empleados/{id}',[EmpleadoController::class,'destroy'])->name('empleados.destroy');
Route::get('/empleados/{id}/edit',[EmpleadoController::class,'edit'])->name('empleados.edit');
Route::patch('/empleados/{id}',[EmpleadoController::class,'update'])->name('empleados.update');