<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;







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

Route::group(['middleware' => ['auth']], function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::post('/products/update', [App\Http\Controllers\ProductController::class, 'update'])->name('update'); 
Route::post('/products/remove', [App\Http\Controllers\ProductController::class, 'remove'])->name('remove');
Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
Route::get('/reservations', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservation');
Route::post('/reservations/store', [App\Http\Controllers\ReservationController::class, 'store']);
Route::post('/reservations/destroy', [App\Http\Controllers\ReservationController::class, 'destroy']);
Route::post('/reservations/update', [App\Http\Controllers\ReservationController::class, 'update']);
});

//protect all routes
    
