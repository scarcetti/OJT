<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', [CategoryController::class, 'all'])->name('categories');
Route::get('/menus', [MenuController::class, 'allMenu'])->name('menus');
// Route::get('/', [CategoryController::class,'all']);


Route::group(['prefix' => 'categories'], function (){
    Route::get('add',function () { return view('categories.create'); })->name('addCategory');
    Route::post('edit/{id}', [CategoryController::class, 'getCategoryById'])->name('editCategory');
    Route::post('update/{id}', [CategoryController::class,'update'])->name('updateCategory');
    Route::get('create', [CategoryController::class,'create'])->name('createCategory');
    Route::get('all', [CategoryController::class,'all'])->name('allCategory');
    Route::delete('delete/{id}', [CategoryController::class,'delete'])->name('deleteCategory');
});
Route::group(['prefix' => 'menus'], function (){
    Route::get('add', [MenuController::class,'add'])->name('addMenu');
    Route::post('edit/{id}', [MenuController::class, 'getMenuById'])->name('editMenu');
    // Route::get('add', [MenuController::class,'add'])->name('addMenu');
    Route::post('update/{id}', [MenuController::class,'update'])->name('updateMenu');
    Route::get('create', [MenuController::class, 'create'])->name('createMenu');
    Route::post('create', [MenuController::class, 'store'])->name('storeMenu');
    Route::get('allMenu', [MenuController::class,'allMenu'])->name('allMenu');
    Route::delete('/delete/{id}', [MenuController::class,'delete'])->name('deleteMenu');
    // Route::get('/add', function () { return view('menus.create'); })->name('addMenu');
});
