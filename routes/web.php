<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('signin', function () {
//     return view('signIn');
// });
Route::get('/', function () {
    return view('webPress');
})->name('home');

Route::get('/signin', [UserController::class, 'signIn'])->name('signin');
Route::post('/store',[UserController::class,'store'])->name('store');
Route::get('/login',[UserController::class,'login'])->name('signup');
Route::post('/check',[UserController::class,'check'])->name('check');
Route::get('/forgetPassword/{id}',[UserController::class,'forgetPassword'])->name('forgetPassword');
Route::post('/otp/{id}',[UserController::class,'otp'])->name('otp')->middleware('auth:web');
Route::post('/otpCheck',[UserController::class,'otpCheck'])->name('otpCheck');

