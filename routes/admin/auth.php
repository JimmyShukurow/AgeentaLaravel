<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::post('/auth', [AuthController::class, 'loginToAdmin']);

Route::post('/register', [AuthController::class, 'register']);