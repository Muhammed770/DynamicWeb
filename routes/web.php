<?php

use App\Http\Controllers\ComponentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Http\Middleware\RestrictGuestAccess;


Route::get('/', function () {
    return view('welcome');
});
Route::middleware([RestrictGuestAccess::class])->group(function() {
    Route::get('/login', [SessionController::class,'create'])->middleware('guest')->name('login');
    Route::post('/login', [SessionController::class,'store']);
    Route::post('/logout', [SessionController::class,'destroy']);
    
    
    Route::get('/register', [RegisterUserController::class,'create'])->middleware('guest');
    
    Route::post('/register', [RegisterUserController::class,'store']);
    
    Route::get('/projects', [ProjectController::class,'index'])->middleware('auth');
    Route::post('/projects', [ProjectController::class,'store'])->middleware('auth');
    
    Route::resource('/projects/{project}/pages', PageController::class,[
        'only' => ['index','store','show']
    ]);
    Route::resource('/projects/{project}/pages/{page}/components', ComponentController::class,[
        'only' => ['store']
    ]);
});

