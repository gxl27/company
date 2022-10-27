<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\EmployeeController as AdminEmployeeController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\Admin\DepartamentController as AdminDepartamentController;
use App\Http\Controllers\AuthController;

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


Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth
Route::get('/register', [AuthController::class, 'create'])->name('register')->middleware('guest');
Route::post('/auth', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/auth/authenticate', [AuthController::class, 'authenticate']);

// employees table
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee_index');

// departament table
Route::get('/departament', [DepartamentController::class, 'index'])->name('departament_index');

// admin employees table
Route::get('/admin/employee', [AdminEmployeeController::class, 'index'])->name('admin_employee')->middleware('auth');

// admin departament table
Route::get('/admin/departament', [AdminDepartamentController::class, 'index'])->name('admin_departament')->middleware('auth');