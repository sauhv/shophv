<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIproductController;
use App\Models\Categories;
use App\Models\products;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('home', APIproductController::class);
Route::get('/getCategory', function () {
    return categories::getCategory();
});
Route::get('test', [APIproductController::class , 'testOrder']);
Route::get('testxt', [APIproductController::class , 'testxt']);
Route::get('testship', [APIproductController::class , 'testship']);