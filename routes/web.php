<?php

use App\Http\Controllers\AppSettingsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationRequestController;
use App\Http\Controllers\GovernorateController;
use App\Http\Controllers\PostController;
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


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::resource('governorate', GovernorateController::class);
    // Route::get('/governorate/search', [GovernorateController::class, 'search'])->name('governorate.search');

    Route::resource('city', CityController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('post', PostController::class);


    //clients
    Route::get('/clients', [ClientController::class, 'index'])->name('client.index');
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('client.destroy');

    //contacts
    Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
    Route::delete('/contacts/{id}', [ContactsController::class, 'destroy'])->name('contacts.destroy');

    //contacts
    Route::get('/donation-requests', [DonationRequestController::class, 'index'])->name('donationRequest.index');
    Route::get('/donation-requests/{id}', [DonationRequestController::class, 'show'])->name('donationRequest.show');
    Route::delete('/donation-requests/{id}', [DonationRequestController::class, 'destroy'])->name('donationRequest.destroy');

    //settings
    Route::get('/settings', [AppSettingsController::class, 'index'])->name('appSettings.index');
    Route::get('/settings/edit', [AppSettingsController::class, 'edit'])->name('appSettings.edit');
    Route::put('/settings', [AppSettingsController::class, 'update'])->name('appSettings.update');
});
