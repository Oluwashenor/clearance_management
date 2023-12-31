<?php

use App\Http\Controllers\ClearanceModuleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserClearanceController;
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

Route::get('/', [StudentController::class, 'index'])->middleware('auth');

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

//Faculties
Route::get('/faculties', [FacultyController::class, 'index'])->name('faculties');
Route::post('/createFaculty', [FacultyController::class, 'create']);
Route::get('/faculty/detail/{id}', [FacultyController::class, 'detail'])->name('faculty');


//Students
Route::get('/students/index', [StudentController::class, 'students'])->name('students');
Route::post('/students/edit', [StudentController::class, 'edit']);



//Departments
Route::post('/createDepartment', [DepartmentController::class, 'create']);
Route::post('/deleteDepartment/{id}', [DepartmentController::class, 'delete']);

//Clearance
Route::get('/clearance-module/index', [ClearanceModuleController::class, 'index']);
Route::post('/clearance-module/create', [ClearanceModuleController::class, 'create']);

Route::post('/students/clear', [UserClearanceController::class, 'clear']);
