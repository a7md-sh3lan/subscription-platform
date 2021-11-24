<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::resource('websites', WebsiteController::class);
Route::resource('users', UserController::class);
Route::resource('posts', PostController::class);

Route::post('subscripe', [UserController::class, 'subscripe']);
