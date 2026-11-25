<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\GovernmentHolidayController;
use App\Models\Employee;


// Dashboard
Route::get('/', function () {
    $employees = Employee::orderBy('employee_code')->get();

    $lastEmployeeCode = Employee::max('employee_code');

    $nextEmployeeCode = $lastEmployeeCode
        ? $lastEmployeeCode + 1
        : 1001;

    return view('dashboard', compact(
        'employees',
        'nextEmployeeCode'
    ));
})->name('dashboard');


// Employee
Route::post('/employee', [EmployeeController::class, 'store'])
    ->name('employee.store');


// Attendance Entry
Route::get('/attendance', [AttendanceController::class, 'index'])
    ->name('attendance.index');

Route::post('/attendance', [AttendanceController::class, 'store'])
    ->name('attendance.store');


// ⭐ View Attendance
Route::get('/view-attendance', [AttendanceController::class, 'viewAttendance'])
    ->name('attendance.view');


// Leave
Route::get('/leave', [LeaveController::class, 'create'])
    ->name('leave.create');

Route::post('/leave', [LeaveController::class, 'store'])
    ->name('leave.store');
Route::post(
    '/government-holiday/store',
    [GovernmentHolidayController::class, 'store']
)->name('government-holiday.store');