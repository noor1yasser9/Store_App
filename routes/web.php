<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StoreController;
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
    return view('auth.login');
});
Auth::routes();

Route::resource('category', CategoryController::class)->middleware("auth");

Route::resource('stores', StoreController::class)->middleware("auth");

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/index',App\Http\Controllers\WebController::class);

Route::PUT('/update',[App\Http\Controllers\WebController::class,"update"]);
