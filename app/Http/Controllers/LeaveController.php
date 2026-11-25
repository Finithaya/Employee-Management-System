<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Employee;

class LeaveController extends Controller
{
   public function create() {
        $employees = Employee::all();
        return view('dashboard', compact('employees'));
    }
    public function store(Request $request){
    $request->validate([
        'employee_id' => 'required|exists:employees,id',
        'leave_date' => 'required|date',
        'leave_type' => 'required',
    ]);
    $exists = Leave::where('employee_id', $request->employee_id)
        ->where('leave_date', $request->leave_date)
        ->exists();
    if ($exists) {
    return back()
        ->withInput()
        ->with('leave_error', ' Already exist.')
        ->with('active_form', 'leave');
}
Leave::create([
    'employee_id' => $request->employee_id,
    'leave_date' => $request->leave_date,
    'leave_type' => $request->leave_type,
]);
return back()
    ->with('leave_success', 'Leave saved successfully!')
    ->with('active_form', 'leave');
}}
