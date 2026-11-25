<?php

namespace App\Http\Controllers;

use App\Models\GovernmentHoliday;
use Illuminate\Http\Request;

class GovernmentHolidayController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'holiday_date' => 'required|date|unique:government_holidays,holiday_date',
            'holiday_name' => 'required|string|max:255',
        ]);
        GovernmentHoliday::create([
            'holiday_date' => $request->holiday_date,
            'holiday_name' => $request->holiday_name,
        ]);
        return redirect()
            ->route('dashboard')
            ->with('holiday_success', 'Government holiday added successfully.');
    }
}