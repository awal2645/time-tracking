<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkTimeController;
use App\Http\Controllers\EmployeeController;



Route::post('api/employee', [EmployeeController::class, 'create']);
Route::post('api/work-time', [WorkTimeController::class, 'register']);
Route::get('api/work-time-summary', [WorkTimeController::class, 'summary']);
