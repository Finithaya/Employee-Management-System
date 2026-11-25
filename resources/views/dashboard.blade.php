<!DOCTYPE html>
<html>
<head>
<title>Employee Management System</title>
<style>
* {
    box-sizing: border-box;
}
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f5f5f5;
}
.header {
    height: 100px;
    background: #16b957;
    color: white;
    display: flex;
    align-items: center;
    padding: 0 30px;
    font-size: 32px;
    font-weight: bold;
}
.welcome {
    margin-left: auto;
    font-size: 22px;
    font-weight: normal;
}
.main {
    display: flex;
    min-height: calc(100vh - 100px);
}
.sidebar {
    width: 300px;
    padding: 20px;
    background: #f7f7f7;
    border-right: 2px solid #aaa;
}
.menu {
    display: block;
    width: 100%;
    padding: 14px;
    margin-bottom: 10px;
    border: none;
    border-radius: 10px;
    text-align: center;
    font-size: 17px;
    font-weight: bold;
    color: #111;
    cursor: pointer;
}
.employee {
    background: #b9d8f5;
}

.attendance {
    background: #b8f0cc;
}

.leave {
    background: #f5d6a6;
}

.view-attendance {
    background: #d8c5f5;
}

.content {
    flex: 1;
    background: white;
    padding: 40px;
}

.content-title {
    text-align: center;
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 30px;
}

.success,
.error {
    width: 700px;
    max-width: 100%;
    margin: 0 auto 20px;
    padding: 12px;
    text-align: center;
    border-radius: 5px;
}

.success {
    background: #d1fae5;
    color: #065f46;
    border: 1px solid #10b981;
}

.error {
    background: #fee2e2;
    color: #991b1b;
    border: 1px solid #ef4444;
}

.form-box {
    width: 700px;
    max-width: 100%;
    margin: 0 auto;
    padding: 35px 40px;
    background: white;
    border: 1px solid #d5d5d5;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.form-row {
    display: grid;
    grid-template-columns: 180px 1fr;
    column-gap: 25px;
    align-items: center;
    margin-bottom: 22px;
}

.form-row label {
    font-size: 16px;
    font-weight: bold;
    color: #333;
}

.form-row input,
.form-row select {
    width: 100%;
    height: 42px;
    padding: 8px 12px;
    border: 1px solid #bbb;
    border-radius: 5px;
    font-size: 15px;
}

.form-row input[readonly] {
    background: #eeeeee;
    color: #555;
}

.buttons {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: 30px;
}

.save,
.clear {
    width: 120px;
    height: 40px;
    border: none;
    border-radius: 5px;
    font-size: 15px;
    font-weight: bold;
    cursor: pointer;
}

.save {
    background: #16b957;
    color: white;
}

.clear {
    background: #ddd;
    color: #222;
}

#attendanceForm,
#leaveForm,
#viewAttendanceForm {
    display: none;
}

.attendance-info {
    width: 700px;
    max-width: 100%;
    margin: 0 auto 20px;
    padding: 12px;
    text-align: center;
    background: white;
    border: 1px solid #d5d5d5;
    border-radius: 5px;
    color: #333;
}

.attendance-buttons {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-top: 30px;
}

.attendance-save {
    width: 130px;
    height: 40px;
    border: none;
    border-radius: 5px;
    background: #16b957;
    color: white;
    font-size: 15px;
    font-weight: bold;
    cursor: pointer;
}

.attendance-new {
    width: 100px;
    height: 40px;
    border: none;
    border-radius: 5px;
    background: #ddd;
    color: #222;
    font-size: 15px;
    font-weight: bold;
    cursor: pointer;
}

.attendance-report {
    width: 100%;
    max-width: 1100px;
    margin: 25px auto;
    padding: 20px 25px;
    background: white;
    border: 1px solid #ccc;
    border-radius: 8px;
}

.report-header {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    min-height: 100px;
}

.company-logo {
    width: 220px;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    flex-shrink: 0;
}

.company-logo img {
    width: 190px;
    height: auto;
    display: block;
}

.company-name {
    font-size: 34px;
    font-weight: bold;
    color: #222;
    white-space: nowrap;
}

.report-line {
    width: 100%;
    border: none;
    border-top: 1px solid #333;
    margin: 10px 0 15px;
}

.report-details {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
    font-size: 16px;
    color: #333;
}

.report-details-left {
    text-align: left;
}

.report-details-right {
    text-align: right;
}

.report-details strong {
    font-weight: bold;
}

.attendance-table-box {
    width: 100%;
    margin: 0 auto;
    overflow-x: auto;
}

.attendance-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 12px;
    table-layout: fixed;
}

.attendance-table th,
.attendance-table td {
    border: 1px solid #ccc;
    padding: 5px 4px;
    text-align: center;
    white-space: nowrap;
    height: 28px;
}

.attendance-table th {
    background: #f0f0f0;
    font-weight: bold;
    font-size: 12px;
}

.attendance-table th:nth-child(1),
.attendance-table td:nth-child(1) {
    width: 17%;
}

.attendance-table th:nth-child(2),
.attendance-table td:nth-child(2) {
    width: 17%;
}

.attendance-table th:nth-child(3),
.attendance-table td:nth-child(3) {
    width: 22%;
}

.attendance-table th:nth-child(4),
.attendance-table td:nth-child(4) {
    width: 22%;
}

.attendance-table th:nth-child(5),
.attendance-table td:nth-child(5) {
    width: 22%;
}

.sunday-row {
    background: #fafafa;
}

.holiday-row {
    background: #fff3cd;
    font-weight: bold;
}

.holiday-name {
    color: #b45309;
    font-weight: bold;
}

.leave-row {
    background: #fce7f3;
    font-weight: bold;
}

.leave-name {
    color: #be185d;
    font-weight: bold;
}

@media (max-width: 800px) {

    .sidebar {
        width: 220px;
    }

    .content {
        padding: 25px;
    }

    .form-row {
        grid-template-columns: 1fr;
        row-gap: 8px;
    }

    .report-header {
        flex-direction: column;
        align-items: flex-start;
        min-height: auto;
    }

    .company-logo {
        width: auto;
        height: auto;
        margin-bottom: 10px;
    }

    .company-name {
        font-size: 30px;
    }

    .report-details {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }

    .report-details-right {
        text-align: left;
    }

    .attendance-table {
        font-size: 11px;
    }

    .attendance-table th,
    .attendance-table td {
        padding: 4px 3px;
        height: 25px;
    }
}

</style>

</head>
<body>
<div class="header">Employee Management System
<div class="welcome"> Welcome, Admin </div>
</div>
<div class="main">

<div class="sidebar">

    <button type="button" class="menu employee" onclick="showEmployeeForm()">
        Employee Installation
    </button>

    <button type="button"  class="menu attendance" onclick="showAttendanceForm()">
        Attendance Entry
    </button>

    <button type="button" class="menu leave" onclick="showLeaveForm()">
        Leave Form Entry
    </button>

    <button type="button" class="menu view-attendance" onclick="showViewAttendanceForm()">
        View Attendance
    </button>

</div>

<div class="content">
<div id="employeeForm">

    <div class="content-title">
        Employee Installation
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-box">

        <form action="{{ route('employee.store') }}" method="POST">

            @csrf

            <div class="form-row">
                <label>Employee Code</label>

                <input type="text"
                       name="employee_code"
                       value="{{ $nextEmployeeCode ?? '1001' }}"
                       readonly>
            </div>

            <div class="form-row">
                <label>Employee Name</label>

                <input type="text"
                       name="employee_name"
                       required>
            </div>

            <div class="form-row">
                <label>Employee Gender</label>

                <select name="gender" required>

                    <option value="">Select Gender</option>

                    <option value="Male">Male</option>

                    <option value="Female">Female</option>

                    <option value="Other">Other</option>

                </select>
            </div>

            <div class="form-row">
                <label>Monthly Salary</label>

                <input type="number"
                       name="monthly_salary"
                       min="0"
                       step="0.01"
                       required>
            </div>

            <div class="form-row">
                <label>Check In Time</label>

                <input type="time"
                       name="check_in_time"
                       required>
            </div>

            <div class="form-row">
                <label>Check Out Time</label>

                <input type="time"
                       name="check_out_time"
                       required>
            </div>

            <div class="buttons">

                <button type="submit" class="save">
                    Save
                </button>

                <button type="reset" class="clear">
                    Clear
                </button>

            </div>

        </form>

    </div>

</div>


<div id="attendanceForm">

    <div class="content-title">
        Attendance Entry
    </div>

    <div class="attendance-info">

        <span id="employeeCounter">
            Employee 1
        </span>

    </div>

    <div class="form-box">

        <form id="attendanceEntryForm">

            @csrf

            <div class="form-row">

                <label>Attendance Date</label>

                <input type="date"
                       id="attendance_date"
                       name="attendance_date"
                       required>

            </div>

            <div class="form-row">

                <label>Employee Name</label>

                <input type="text"
                       id="attendance_employee_name"
                       readonly>

            </div>

            <div class="form-row">

                <label>Check-in Time</label>

                <input type="time"
                       id="attendance_check_in"
                       name="check_in"
                       required>

            </div>

            <div class="form-row">

                <label>Check-out Time</label>

                <input type="time"
                       id="attendance_check_out"
                       name="check_out"
                       required>

            </div>

            <input type="hidden"
                   id="attendance_employee_id"
                   name="employee_id">

            <div class="attendance-buttons">

                <button type="submit"
                        class="attendance-save">
                    Save & Next
                </button>

                <button type="button"
                        class="attendance-new"
                        onclick="newAttendance()">
                    New
                </button>

            </div>

        </form>

    </div>

</div>

<div id="leaveForm">

    <div class="content-title">
        Leave Form Entry
    </div>

    @if(session('leave_success'))

        <div class="success">
            {{ session('leave_success') }}
        </div>

    @endif

    @if(session('leave_error'))

        <div class="error">
            {{ session('leave_error') }}
        </div>

    @endif

    <div class="form-box">

        <form action="{{ route('leave.store') }}"
              method="POST">

            @csrf

            <div class="form-row">

                <label>Employee Name</label>

                <select name="employee_id" required>

                    <option value="">
                        Select Employee
                    </option>

                    @foreach($employees as $employee)

                        <option value="{{ $employee->id }}">

                            {{ $employee->employee_code }}
                            -
                            {{ $employee->employee_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-row">

                <label>Leave Date</label>

                <input type="date"
                       name="leave_date"
                       required>

            </div>

            <div class="form-row">

                <label>Leave Type</label>

                <select name="leave_type" required>

                    <option value="">
                        Select Leave Type
                    </option>

                    <option value="Sick Leave">
                        Sick Leave
                    </option>

                    <option value="Family Responsibility Leave">
                        Family Responsibility Leave
                    </option>

                    <option value="Medical Leave">
                        Medical Leave
                    </option>

                </select>

            </div>

            <div class="buttons">

                <button type="submit" class="save">
                    Save
                </button>

                <button type="reset" class="clear">
                    Clear
                </button>

            </div>

        </form>

    </div>

</div>


<div id="viewAttendanceForm">

    <div class="content-title">
        View Attendance
    </div>

    <div class="form-box">

        <form action="{{ route('attendance.view') }}"
              method="GET">

            <div class="form-row">

                <label>Employee Name</label>

                <select name="employee_id" required>

                    <option value="">
                        Select Employee
                    </option>

                    @foreach($employees as $employee)

                        <option
                            value="{{ $employee->id }}"
                            {{ ($selectedEmployee ?? '') == $employee->id ? 'selected' : '' }}>

                            {{ $employee->employee_code }}
                            -
                            {{ $employee->employee_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-row">

                <label>Year</label>

                <select name="year" required>

                    <option value="">
                        Select Year
                    </option>

                    <option value="2025"
                        {{ ($selectedYear ?? '') == '2025' ? 'selected' : '' }}>
                        2025
                    </option>

                    <option value="2026"
                        {{ ($selectedYear ?? '') == '2026' ? 'selected' : '' }}>
                        2026
                    </option>

                    <option value="2027"
                        {{ ($selectedYear ?? '') == '2027' ? 'selected' : '' }}>
                        2027
                    </option>

                </select>

            </div>

            <div class="form-row">

                <label>Month</label>

                <select name="month" required>

                    <option value="">
                        Select Month
                    </option>

                    @for($m = 1; $m <= 12; $m++)

                        @php
                            $monthValue = sprintf('%02d', $m);
                        @endphp

                        <option
                            value="{{ $monthValue }}"
                            {{ ($selectedMonth ?? '') == $monthValue ? 'selected' : '' }}>

                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}

                        </option>

                    @endfor

                </select>

            </div>

            <div class="buttons">

                <button type="submit" class="save">
                    View Attendance
                </button>

                <button type="button"
                        class="clear"
                        onclick="clearViewAttendance()">
                    Clear
                </button>

            </div>

        </form>

    </div>

    @if(
        !empty($selectedEmployee) &&
        !empty($selectedYear) &&
        !empty($selectedMonth)
    )

        @php

            $daysInMonth = cal_days_in_month(
                CAL_GREGORIAN,
                (int)$selectedMonth,
                (int)$selectedYear
            );

            $selectedEmployeeData =
                $employees->firstWhere(
                    'id',
                    $selectedEmployee
                );

            $displayMonth = date(
                'F Y',
                mktime(
                    0,
                    0,
                    0,
                    (int)$selectedMonth,
                    1,
                    (int)$selectedYear
                )
            );


            $holidays = ($governmentHolidays ?? collect())
                ->mapWithKeys(function ($holiday) {

                    return [

                        date(
                            'Y-m-d',
                            strtotime($holiday->holiday_date)
                        )

                        => $holiday->holiday_name

                    ];

                });

            $employeeLeaves = ($leaveRecords ?? collect())

                ->filter(function ($leave) use ($selectedEmployee) {

                    return
                        (int)$leave->employee_id ===
                        (int)$selectedEmployee;

                })

                ->mapWithKeys(function ($leave) {

                    return [

                        date(
                            'Y-m-d',
                            strtotime($leave->leave_date)
                        )

                        => $leave->leave_type

                    ];

                });

        @endphp


        <div class="attendance-report">

            <div class="report-header">

                <div class="company-logo">

                    <img src="{{ asset('images/company-logo.png') }}"
                         alt="EMS Solutions">

                </div>

                <div class="company-name">
                    EMS Solutions
                </div>

            </div>

            <hr class="report-line">

            <div class="report-details">

                <div class="report-details-left">

                    Employee:

                    <strong>
                        {{ $selectedEmployeeData->employee_name ?? '' }}
                    </strong>

                </div>

                <div class="report-details-right">

                    Month:

                    <strong>
                        {{ $displayMonth }}
                    </strong>

                </div>

            </div>


            <div class="attendance-table-box">

                <table class="attendance-table">

                    <thead>

                        <tr>

                            <th>Date</th>

                            <th>Day</th>

                            <th>Check-in Time</th>

                            <th>Check-out Time</th>

                            <th>Working Hours</th>

                        </tr>

                    </thead>


                    <tbody>

                    @for(
                        $day = 1;
                        $day <= $daysInMonth;
                        $day++
                    )

                        @php

                            $date = sprintf(
                                '%04d-%02d-%02d',
                                $selectedYear,
                                $selectedMonth,
                                $day
                            );

                            $dayName = date(
                                'l',
                                strtotime($date)
                            );

                            $record =
                                $attendanceRecords
                                ->firstWhere(
                                    'attendance_date',
                                    $date
                                );

                            $leaveName = null;

                            if (!$record) {

                                $leaveName =
                                    $employeeLeaves[$date]
                                    ?? null;

}

                            $holidayName = null;

                            if (!$record && !$leaveName) {

                                $holidayName =
                                    $holidays[$date]
                                    ?? null;

                            }

                            $workingHours = '-';

                            if (
                                $record &&
                                $record->check_in &&
                                $record->check_out
                            ) {

                                $checkIn =
                                    strtotime(
                                        $record->check_in
                                    );

                                $checkOut =
                                    strtotime(
                                        $record->check_out
                                    );

                                $difference =
                                    $checkOut - $checkIn;

                                $hours =
                                    floor(
                                        $difference / 3600
                                    );

                                $minutes =
                                    floor(
                                        ($difference % 3600) / 60
                                    );

                                $workingHours =
                                    $hours .
                                    ' hrs ' .
                                    $minutes .
                                    ' mins';

                            }

                            if ($record) {

                                $rowClass = '';

                            }

                            elseif ($leaveName) {

                                $rowClass =
                                    'leave-row';

                            }

                            elseif ($holidayName) {

                                $rowClass =
                                    'holiday-row';

                            }

                            elseif ($dayName == 'Sunday') {

                                $rowClass =
                                    'sunday-row';

                            }

                            else {

                                $rowClass = '';

                            }

                        @endphp


                        <tr class="{{ $rowClass }}">

                            <td>

                                {{ date(
                                    'd-m-Y',
                                    strtotime($date)
                                ) }}

                            </td>


                            <td>

                                {{ $dayName }}

</td>

                            <td>

                                @if($record)

                                    {{ $record->check_in ?? '-' }}

                                @else

                                    -

                                @endif

                            </td>

                            <td>

                                @if($record)

                                    {{ $record->check_out ?? '-' }}

                                @else

                                    -

                                @endif

                            </td>

                            <td>

                                @if($record)

                                    {{ $workingHours }}


                                @elseif($leaveName)

                                    <span class="leave-name">

                                        {{ $leaveName }}

                                    </span>


                                @elseif($holidayName)

                                    <span class="holiday-name">

                                        {{ $holidayName }}

                                    </span>


                                @else

                                    {{ $workingHours }}

                                @endif

                            </td>

                        </tr>


                    @endfor

                    </tbody>

                </table>

            </div>

        </div>

    @endif

</div>

</div>

</div>


<script>

const employees =
    @json($employees ?? []);

let currentEmployeeIndex = 0;


function hideAllForms()
{
    document.getElementById("employeeForm").style.display = "none";

    document.getElementById("attendanceForm").style.display = "none";

    document.getElementById("leaveForm").style.display = "none";

    document.getElementById("viewAttendanceForm").style.display = "none";
}


function showEmployeeForm()
{
    hideAllForms();

    document.getElementById("employeeForm").style.display = "block";
}


function showAttendanceForm()
{
    hideAllForms();

    document.getElementById("attendanceForm").style.display = "block";

    currentEmployeeIndex = 0;

    loadAttendanceEmployee();
}


function loadAttendanceEmployee()
{
    if (employees.length === 0)
    {
        alert(
            "No employees found. Please add an employee first."
        );

        return;
    }

    const employee =
        employees[currentEmployeeIndex];

    document.getElementById(
        "attendance_employee_id"
    ).value = employee.id;

    document.getElementById(
        "attendance_employee_name"
    ).value =
        employee.employee_code +
        " - " +
        employee.employee_name;

    document.getElementById(
        "attendance_check_in"
    ).value = "";

    document.getElementById(
        "attendance_check_out"
    ).value = "";

    document.getElementById(
        "employeeCounter"
    ).innerText =
        "Employee " +
        (currentEmployeeIndex + 1) +
        " of " +
        employees.length;
}


document
    .getElementById("attendanceEntryForm")
    .addEventListener(
        "submit",
        function(event)
        {
            event.preventDefault();

            const formData =
                new FormData(this);

            fetch(
                "{{ route('attendance.store') }}",
                {
                    method: "POST",

                    body: formData,

                    headers: {
                        "X-CSRF-TOKEN":
                            document.querySelector(
                                '#attendanceEntryForm input[name="_token"]'
                            ).value,

                        "Accept":
                            "application/json"
                    }
                }
            )

            .then(
                response =>
                    response.json()
            )

            .then(
                data =>
                {
                    if (data.success)
                    {
                        alert(data.message);

                        currentEmployeeIndex++;

                        if (
                            currentEmployeeIndex <
                            employees.length
                        )
                        {
                            loadAttendanceEmployee();
                        }
                        else
                        {
                            alert(
                                "All employees attendance completed."
                            );

                            currentEmployeeIndex = 0;

                            loadAttendanceEmployee();
                        }
                    }
                    else
                    {
                        alert(
                            data.message ||
                            "Unable to save attendance."
                        );
                    }
                }
            )

            .catch(
                error =>
                {
                    console.error(error);

                    alert(
                        "Something went wrong while saving attendance."
                    );
                }
            );
        }
    );


function newAttendance()
{
    currentEmployeeIndex = 0;

    document
        .getElementById(
            "attendanceEntryForm"
        )
        .reset();

    loadAttendanceEmployee();

    document
        .getElementById(
            "attendance_date"
        )
        .focus();
}


function showLeaveForm()
{
    hideAllForms();

    document.getElementById("leaveForm").style.display = "block";
}


function showViewAttendanceForm()
{
    hideAllForms();

    document.getElementById("viewAttendanceForm").style.display = "block";
}


function clearViewAttendance()
{
    window.location.href =
        "{{ route('dashboard') }}";
}


const activeForm =
    @json($activeForm ?? 'employee');


if (activeForm === 'attendance')
{
    showAttendanceForm();
}
else if (activeForm === 'leave')
{
    showLeaveForm();
}
else if (activeForm === 'viewAttendance')
{
    showViewAttendanceForm();
}
else
{
    showEmployeeForm();
}</script>
</body>
</html>