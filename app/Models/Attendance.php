<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Attendance extends Model
{
    protected $fillable = [
        'attendance_date',
        'employee_id',
        'check_in',
        'check_out',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}