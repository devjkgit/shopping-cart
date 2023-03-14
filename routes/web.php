<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;
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

//User signin
Route::get('/', [LoginController::class, 'signin']);
Route::get('/login', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/test', [LoginController::class, 'test']);

//Product
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{product_id}', [ProductController::class, 'get_product']);
Route::get('/cart', [ProductController::class, 'cart']);
Route::get('/add-to-cart/{product_id}/{qty?}', [ProductController::class, 'add_to_cart']);
Route::get('/clear-cart', [ProductController::class, 'clear_cart']);
