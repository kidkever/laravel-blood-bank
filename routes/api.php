<?php

use App\Http\Controllers\Api\AppSettingsController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DonationRequestController;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
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

  Route::post('/profile/forgot-password', [ProfileController::class, 'forgotPassword']);
  Route::post('/profile/reset-password', [ProfileController::class, 'resetPassword']);

  Route::get('/cities', [MainController::class, 'cities']);
  Route::get('/governorates', [MainController::class, 'governorates']);
  Route::get('/blood-types', [MainController::class, 'bloodTypes']);

  Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [ProfileController::class, 'getProfile']);
    Route::put('/profile', [ProfileController::class, 'updateProfile']);

    // app settings
    Route::get('/app-settings', [AppSettingsController::class, 'appSettings']);
    Route::post('/contact-us', [AppSettingsController::class, 'contactUsMsg']);

    // posts
    Route::get('/posts', [PostController::class, 'posts']);
    Route::get('/posts/favourites', [PostController::class, 'favouritePosts']);
    Route::post('/posts/favourites/{id}', [PostController::class, 'addToFavourites']);
    Route::get('/posts/{id}', [PostController::class, 'singlePost']);

    // notifications
    Route::get('/notifications', [NotificationController::class, 'getAllNotifications']);
    Route::put('/notification/{id}', [NotificationController::class, 'updateReadNotification']);
    Route::get('/notification-settings', [NotificationController::class, 'getNotificationSettings']);
    Route::put('/notification-settings', [NotificationController::class, 'updateNotificationSettings']);

    // donation requests
    Route::get('/donation-request', [DonationRequestController::class, 'getAllDonationRequests']);
    Route::get('/donation-request/{id}', [DonationRequestController::class, 'getSingleDonationRequest']);
    Route::post('/donation-request', [DonationRequestController::class, 'createDonationRequest']);

    // test
    Route::get('/products', function () {
      return ['id' => 1, 'name' => 'iphone'];
    });
  });
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
