<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GovernmentHoliday extends Model
{
   protected $fillable = [
    'holiday_date',
    'holiday_name'
   ];
}
