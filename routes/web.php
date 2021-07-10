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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/maestro', [App\Http\Controllers\HomeController::class, 'maestro'])->name('maestro');
Route::get('/tallerista', [App\Http\Controllers\HomeController::class, 'tallerista'])->name('tallerista');
Route::get('/index',[App\Http\Controllers\Tallerista\SesionController::class,'index']);

Route::group(['prefix' => App\Http\Controllers\Tallerista\SesionController::class,'Tallerista','middleware'=>'auth'], function () {
    Route::get('index','Tallerista\SesionController@index');
});

