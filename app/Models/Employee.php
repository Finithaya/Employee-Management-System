<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   protected $fillable = [
        'employee_code',
        'employee_name',
        'gender',
        'monthly_salary',
        'check_in_time',
        'check_out_time',
    ];
    public function attendances(){
        return $this->hasMany(Attendance::class);
    }
}
