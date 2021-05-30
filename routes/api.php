<?php

use App\Http\Controllers\ProductContorller;
use App\Http\Controllers\AuthController;
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

//Route::resource('/products',ProductContorller::class);
/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

//Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'logIn']);
Route::get('/products', [ProductContorller::class, 'index']);
Route::get('/products/{id}', [ProductContorller::class, 'show']);
Route::get('/products/search/{name}', [ProductContorller::class, 'search']);


//Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ProductContorller::class, 'store']);
    Route::put('/products/{id}', [ProductContorller::class, 'update']);
    Route::delete('/products/{id}', [ProductContorller::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logOut']);
});
