<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::post('/login', [AuthController::class, 'login'])->name('login');
route::post('/register', [AuthController::class, 'register']);
route::get('/user', [AuthController::class, 'user']);
route::get('/user/{id}', [AuthController::class, 'getuser'])->middleware('auth:api');
route::delete('/deleteuser/{id}', [AuthController::class, 'delecteuser']);
route::get('/edituser/{id}', [AuthController::class, 'edituser']);
route::put('/updateuser/{id}', [AuthController::class, 'updateuser']);

