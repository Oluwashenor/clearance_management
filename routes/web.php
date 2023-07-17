<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

//AUTH
Route::post('/loginAction', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/register', function () {
    return view('register');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/registerAction', [UserController::class, 'register']);
Route::get('/forgotpassword', [UserController::class, 'forgotpassword']);
Route::post('/forgot_password', [UserController::class, 'forgot_password']);
Route::get('/passwordReset/{token}', [UserController::class, 'passwordReset'])->name('passwordReset');
Route::post('/updatePassword', [UserController::class, 'updatePassword'])->name('updatePassword');
