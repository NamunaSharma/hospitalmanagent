<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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
Route::get('/link',function()
{
  Artisan::call('storage:link');
});

 Route::get('/', [CheckController::class, 'index']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'attemptLogin']);

Route::middleware(['login'])->group(function () {
    Route::get('/patient', [PatientController::class, 'index']);
    Route::get('/patient/create', [PatientController::class, 'create']);
    Route::post('/patient', [PatientController::class, 'store']);
    Route::delete('/patient/{id}', [PatientController::class, 'destroy']);
    Route::get('/patient/{id}/edit', [PatientController::class, 'edit']);
    Route::put('/patient/{id}', [PatientController::class, 'update']);

    Route::get('/doctor', [DoctorController::class, 'index']);
    Route::get('/doctor/create', [DoctorController::class, 'create']);
    Route::post('/doctor', [DoctorController::class, 'store']);
    Route::delete('/doctor/{id}', [DoctorController::class, 'destroy']);
    Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit']);
    Route::put('/doctor/{id}', [DoctorController::class, 'update']);

    Route::get('/department', [DepartmentController::class, 'index']);
    Route::get('/department/create', [DepartmentController::class, 'create']);
    Route::post('/department', [DepartmentController::class, 'store']);
    Route::delete('/department/{id}', [DepartmentController::class, 'destroy']);
    Route::get('/department/{id}/edit', [DepartmentController::class, 'edit']);
    Route::put('/department/{id}', [DepartmentController::class, 'update']);

    Route::get('/appointment', [AppointmentController::class, 'index']);
    Route::get('/appointment/create', [AppointmentController::class, 'create']);
    Route::post('/appointment', [AppointmentController::class, 'store']);
    Route::delete('/appointment/{id}', [AppointmentController::class, 'destroy']);
    Route::get('/appointment/{id}/edit', [AppointmentController::class, 'edit']);
    Route::put('/appointment/{id}', [AppointmentController::class, 'update']);

    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user', [UserController::class, 'store']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
    Route::get('/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::post('/logout', [UserController::class, 'logout']);
    });
