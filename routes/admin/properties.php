<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Property\PropertyController;

Route::apiResource('/properties', PropertyController::class)->middleware('auth:sanctum');