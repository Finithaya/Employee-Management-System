<!DOCTYPE html>
<html>
<head>
<title>Employee Installation</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .header {
            height: 85px;
            background-color: #16b957;
            color: white;
            display: flex;
            align-items: center;
            padding: 0 30px;
            font-size: 28px;
            font-weight: bold;
        }
        .welcome {
            margin-left: auto;
            font-size: 18px;
            font-weight: normal;
        }
        .content {
            min-height: calc(100vh - 85px);
            background-color: white;
            padding: 40px 50px;
        }
        .title {
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 35px;
            color: #222;
        }
        .success {
            width: 700px;
            max-width: 100%;
            margin: 0 auto 20px;
            padding: 10px;
            text-align: center;
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #10b981;
            border-radius: 5px;
        }
        .form-box {
            width: 700px;
            max-width: 100%;
            margin: 0 auto;
            padding: 35px 40px;
            background-color: #ffffff;
            border: 1px solid #d8d8d8;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }
        .form-row {
            display: grid;
            grid-template-columns: 180px 420px;
            column-gap: 25px;
            align-items: center;
            margin-bottom: 22px;
        }
        .form-row label {
            width: 180px;
            text-align: left;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }
        .form-row input,
        .form-row select {
            width: 420px;
            height: 42px;
            padding: 8px 12px;
            border: 1px solid #bdbdbd;
            border-radius: 5px;
            font-size: 15px;
            outline: none;
        }
        .form-row input:focus,
        .form-row select:focus {
            border-color: #16b957;
        }
        .form-row input[readonly] {
            background-color: #eeeeee;
            color: #555;
            cursor: not-allowed;
        }
        .buttons {
            display: flex;
            justify-content: center;
            gap: 12px;
         margin-top: 30px;
        }
        .save,
        .clear {
            min-width: 110px;
            height: 40px;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }
        .save {
            background-color: #16b957;
            color: white;
        }
        .save:hover {
            background-color: #129b49;
        }
        .clear {
            background-color: #dddddd;
            color: #222;
        }
        .clear:hover {
            background-color: #c8c8c8;
        }
        @media (max-width: 800px) {
           .content {
                padding: 25px;
            }
            .form-row {
                grid-template-columns: 1fr;
                row-gap: 8px;
            }
            .form-row label {
                width: 100%;
            }
            .form-row input,
            .form-row select {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="header">Employee Management System
<div class="welcome"> Welcome, Admin</div>
</div>
<div class="content">
<div class="title">Employee Installation </div>
 @if(session('success'))
<div class="success">
{{ session('success') }}
</div>
@endif
<div class="form-box">
<form action="{{ route('employee.store') }}" method="POST">
@csrf
<div class="form-row">
<label> Employee Code </label>
<input type="text" name="employee_code" value="{{ $nextEmployeeCode }}" readonly  >
</div>
<div class="form-row">
<label> Employee Name </label>
<input type="text" name="employee_name" required>
</div>
<div class="form-row">
<label> Employee Gender</label>
<select name="gender" required>
<option value="">Select Gender</option>
<option value="Male">Male</option>
<option value="Female"> Female </option>
<option value="Other"> Other </option>
</select>
</div>
<div class="form-row">
<label> Monthly Salary </label>
<input type="number" name="monthly_salary" min="0" step="0.01" required>
</div>
<div class="form-row">
<label>Check In Time </label>
<input type="time" name="check_in_time" required>
</div>
<div class="form-row">
<label> Check Out Time </label>
<input type="time" name="check_out_time" required>
</div>
<div class="buttons">
<button type="submit" class="save"> Save</button>
<button type="reset" class="clear"> Clear</button>
</div>
</form>
</div>
</div>
</body>
</html>