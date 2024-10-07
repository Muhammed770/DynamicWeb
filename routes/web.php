<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [SessionController::class,'create'])->middleware('guest');
Route::post('/login', [SessionController::class,'store']);
Route::post('/logout', [SessionController::class,'destroy']);


Route::get('/register', [RegisterUserController::class,'create'])->middleware('guest');

Route::post('/register', [RegisterUserController::class,'store']);

Route::get('/dashboard/projects', [ProjectController::class,'index'])->middleware('auth');
Route::post('/dashboard/projects', [ProjectController::class,'store'])->middleware('auth');

Route::resource('dashboard/{project}/pages', PageController::class);

