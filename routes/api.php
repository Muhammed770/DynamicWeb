<?php

use App\Http\Controllers\Api\V1\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/greeting', function() {
    return response()->json(['message' => 'hello world, the api is working fine'], 200 );
});

Route::post('/v1/pages/{slug}', [PageController::class,'show']);