<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleSocialiteController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json(['name' => $request->user()->name, 'role' => $request->user()->getRoleNames()->first()], 200);
});

Route::middleware(['auth:sanctum'])->group(function(){
    
    include('admin/properties.php');
    

});

include('admin/auth.php');

Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle'])->middleware('web');
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);


