<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
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

Route::prefix('v1')->group(function () {

  Route::post('/register', [AuthController::class, 'register']);
  Route::post('/login', [AuthController::class, 'login']);

  Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile/{id}', [ProfileController::class, 'getProfile'])->name('profile.getProfile');
    Route::put('/profile/{id}', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile');
    Route::post('/profile/forgot-password/{id}', [ProfileController::class, 'forgotPassword'])->name('profile.forgotPassword');
    Route::post('/profile/reset-password/{id}', [ProfileController::class, 'resetPassword'])->name('profile.resetPassword');



    Route::get('/products', function () {
      return ['id' => 1, 'name' => 'iphone'];
    });
  });
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
