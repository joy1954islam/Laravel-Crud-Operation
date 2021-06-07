<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('all/category/', [App\Http\Controllers\CategoryController::class, 'AllCat'])->name('all_category');
Route::post('add/category/', [App\Http\Controllers\CategoryController::class, 'AddCategory'])->name('add_category');
Route::get('edit/category/{id}/', [App\Http\Controllers\CategoryController::class, 'EditCategory'])->name('edit_category');
Route::post('update/category/{id}/', [App\Http\Controllers\CategoryController::class, 'UpdateCategory'])->name('update_category');
Route::delete('delete/category/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('delete_category');