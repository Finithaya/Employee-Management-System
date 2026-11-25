<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class Leave extends Model
{
    protected $fillable = [
        'employee_id',
        'leave_date',
        'leave_type'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
