<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/employee', [App\Http\Controllers\HomeController::class, 'employee']);

Route::get('addemployee',[App\Http\Controllers\HomeController::class, 'addemployee']);
Route::post('employeestore',[App\Http\Controllers\HomeController::class, 'employeestore']);
Route::get('employee-edit/{id}',[App\Http\Controllers\HomeController::class, 'employeeEdit']);
Route::post('employeeupdate',[App\Http\Controllers\HomeController::class, 'employeeupdate']);
Route::get('employeedelete/{id}',[App\Http\Controllers\HomeController::class, 'employeedelete']);



