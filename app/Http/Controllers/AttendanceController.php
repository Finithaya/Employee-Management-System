<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\GovernmentHoliday;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(){
        $employees = Employee::orderBy('employee_code')->get();
        return view('dashboard', [
            'employees' => $employees,
            'activeForm' => 'attendance'
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'attendance_date' => 'required|date',
            'employee_id' => 'required|exists:employees,id',
            'check_in' => 'required',
            'check_out' => 'required',
        ]);
        $exists = Attendance::where('attendance_date', $request->attendance_date)
            ->where('employee_id', $request->employee_id)
            ->exists();
        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => ' Already exist .'
            ]);
        }
        Attendance::create([
            'attendance_date' => $request->attendance_date,
            'employee_id' => $request->employee_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Attendance saved successfully!'
        ]);
    }
   public function viewAttendance(Request $request){
    $employees = Employee::orderBy('employee_code')->get();
    $attendanceRecords = collect();
    $employeeId = $request->employee_id;
    $year = $request->year;
    $month = $request->month;
    if ($employeeId && $year && $month) {
        $attendanceRecords = Attendance::where('employee_id', $employeeId)
            ->whereYear('attendance_date', $year)
            ->whereMonth('attendance_date', $month)
            ->orderBy('attendance_date')
            ->get()
            ->keyBy(function ($record) {
                return $record->attendance_date;
            });
    }
    $governmentHolidays = GovernmentHoliday::all();
    $leaveRecords = Leave::where('employee_id', $employeeId)
    ->whereYear('leave_date', $year)
    ->whereMonth('leave_date', $month)
    ->get();
return view('dashboard', [

    'employees' => $employees,

    'nextEmployeeCode' =>
        (Employee::max('employee_code')
            ? Employee::max('employee_code') + 1
            : 1001),

    'attendanceRecords' => $attendanceRecords,

    'leaveRecords' => $leaveRecords,

    'governmentHolidays' => $governmentHolidays,

    'selectedEmployee' => $employeeId,

    'selectedYear' => $year,

    'selectedMonth' => $month,

    'activeForm' => 'viewAttendance'
]);
}
}