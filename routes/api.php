<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Models\tbl_category;
use Illuminate\Http\Request;
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

Route::group(['prefix' => 'categories'], function (){
    // POST API requests
    Route::post('create', [CategoryController::class,'create']);
    Route::post('update/{id}', [CategoryController::class,'update']);
    // GET API requests
    Route::get('all', [CategoryController::class,'all']);
    // DELETE API requests
    Route::delete('delete/{id}', [CategoryController::class,'delete']);
});
Route::group(['prefix' => 'menus'], function (){
    // POST API requests
    Route::post('create', [MenuController::class,'create']);
    Route::post('update/{id}', [MenuController::class,'update']);
    // GET API requests
    Route::get('all', [MenuController::class,'all']);
    // DELETE API requests
    Route::delete('/delete/{id}', [MenuController::class,'delete']);
});
