<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadFormController;

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
Route::view('testGatherInfo', 'testGatherInfo');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('download', DownloadFormController::class)->name('download');

require __DIR__.'/auth.php';
