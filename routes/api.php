<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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


Route::get('/product-lists',[ProductController::class,'index']);
Route::post('/add-product',[ProductController::class,'store']);

Route::get('/find-product/{id}',[ProductController::class,'show']);

Route::put('/update-product/{id}',[ProductController::class,'update']);


Route::delete('/delete-product/{id}',[ProductController::class,'destroy']);
