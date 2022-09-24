<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\NeighborhoodController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LoginController;



Route::get('/', function () {
    return view('login.index');
});

Route::resource('users', UserController::class)->middleware('auth');

Route::resource('cities', CityController::class)->middleware('auth');

Route::resource('neighborhoods', NeighborhoodController::class)->middleware('auth');

Route::resource('reports', ReportController::class)->middleware('auth');

Route::get('/login/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::resource('login', LoginController::class);