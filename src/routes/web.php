<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

/* product register */
Route::get('/products/register',[ProductController::class, 'registerView']);
Route::post('/products/register',[ProductController::class,'register']);

/* product view */
Route::get('/products',[ProductController::class, 'productsView']);

/* search */
Route::get('/products/search', [ProductController::class, 'search']);

/* product detail */
Route::get('/products/{id}',[ProductController::class,'detail']);

/* product update */
Route::patch('/products/{id}/update',[ProductController::class,'update']);


/* product delete */
Route::delete('/products/{id}/delete',[ProductController::class,'delete']);

