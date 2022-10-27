<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\DepartamentController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employee', [EmployeeController::class, 'index'])->name('api_employee')->middleware('guest');
Route::get('/departament', [DepartamentController::class, 'index'])->name('api_departament')->middleware('guest');