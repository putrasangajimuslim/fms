<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\Admin\CustomerController;

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

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
     
Route::middleware('auth:sanctum')->group( function () {
    Route::resource('products', ProductController::class);
});


// Route::controller(CustomerController::class)->group(function(){
//     Route::get('customer', 'data');
// });

Route::middleware('auth:sanctum')->group( function () {
    Route::controller(CustomerController::class)->group(function(){
        Route::get('customers', 'data');
        Route::post('customers', 'data');
    });
});

// Route::middleware('auth:sanctum')->group( function () {
//     Route::resource('transaction', TransactionController::class);
// });