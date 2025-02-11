<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware(['level:admin'])->group(function(){
        Route::get('/employee/create', [EmployeeController::class,'create'])->name('employee.create');
        Route::post('/employee/create', [EmployeeController::class , 'store'])->name('employee.store');
        Route::post('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
        Route::get('/employee/edit/{id}', [EmployeeController::class,'edit'])->name('employee.edit');
        Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    });

    Route::middleware(['level:admin,user'])->group(function(){
        Route::get('/employee', [EmployeeController::class,'index'])->name('index');
        Route::get('/report/summary', [ReportController::class, 'show'])->name('report.show');
        Route::get('/report/status', [ReportController::class, 'status'])->name('report.status');
    });
});
