<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartificatesController;
use App\Http\Controllers\api\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login',[UserController::class,'login']);
Route::post('UserRegister',[UserController::class,'store']);
Route::get('api_data',[CartificatesController::class,'data_fathcing']); 
Route::get('login-update',[UserController::class,'update']); 
