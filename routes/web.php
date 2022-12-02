<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodes\QrCodesController;

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
Route::group(['prefix' => 'qr-codes', 'middleware' => 'auth'], function () {
    Route::post('/store', [QrCodesController::class, 'store'])->name('qr-codes-store');
    Route::get('/get-users-qr-codes', [QrCodesController::class, 'getUsersQrCodes']);
});
