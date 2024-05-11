<?php

use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\TeamMemberController;
use App\Http\Controllers\API\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|



*/Route::controller(UserAuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [UserAuthController::class,'logout']);

    Route::apiResource('team-members', TeamMemberController::class);
});

// Route::apiResource('team-members', TeamMemberController::class);
