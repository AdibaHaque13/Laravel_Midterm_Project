<?php

use App\Http\Controllers\ProductController;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/',[ProductController::class,'index'])->name("products.name");

Route::get('products/create',[ProductController::class,'create'])->name("products.create");
Route::post('products/store',[ProductController::class,'store'])->name("products.store");
Route::get('products/{id}/edit',[ProductController::class,'edit']);
Route::put('products/{id}/update',[ProductController::class,'update']);
Route::delete('products/{id}/delete',[ProductController::class,'destroy']);
