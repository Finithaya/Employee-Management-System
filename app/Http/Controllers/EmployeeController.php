<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $lastEmployeeCode = Employee::max('employee_code');
        $nextEmployeeCode = $lastEmployeeCode
            ? $lastEmployeeCode + 1
            : 1001;
        return view('dashboard', compact('nextEmployeeCode'));
    }
    public function store(Request $request) {
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'gender' => 'required',
            'monthly_salary' => 'required|numeric|min:0',
            'check_in_time' => 'required',
            'check_out_time' => 'required',
        ]);
        $lastEmployeeCode = Employee::max('employee_code');
        $nextEmployeeCode = $lastEmployeeCode
            ? $lastEmployeeCode + 1
            : 1001;
        Employee::create([
            'employee_code' => $nextEmployeeCode,
            'employee_name' => $request->employee_name,
            'gender' => $request->gender,
            'monthly_salary' => $request->monthly_salary,
            'check_in_time' => $request->check_in_time,
            'check_out_time' => $request->check_out_time,
        ]);
        return redirect('/')
            ->with('success', 'Employee added successfully!');
    }
}