<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::resource('category', CategoryController::class)->middleware("auth");

Route::resource('stores', StoreController::class)->middleware("auth");

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/index',App\Http\Controllers\WebController::class);

Route::PUT('/update',[App\Http\Controllers\WebController::class,"update"]);
