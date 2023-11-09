<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadFormController;
use App\Http\Controllers\LocaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');
Route::view('testMain', 'testMain');
Route::view('gather-info', 'gather-info');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

Route::get('download', DownloadFormController::class)->name('download');
Route::get('change-locale/{locale}', LocaleController::class)->name('change-locale');


// require __DIR__.'/auth.php';
