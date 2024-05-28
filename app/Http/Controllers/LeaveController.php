<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Models\User;
use App\Models\Employee;
use App\Models\Overtime;
use App\Models\FingerDevices;
use App\Helpers\FingerHelper;
use App\Models\Leave;
use App\Http\Requests\AttendanceEmp;
use Illuminate\Support\Facades\Hash;

class LeaveController extends Controller
{
    public function index()
    {
        return view('admin.leave')->with(['leaves' => Leave::all()]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'nullable|string',
        ]);

        // Create a new leave request
        Leave::create([
            'employee_id' => $request->employee_id,
            'leave_type' => $request->leave_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return redirect()->route('admin.leave.index')->with('success', 'Leave request submitted successfully.');
    }

    public function indexOvertime()
    {
        return view('admin.overtime')->with(['overtimes' => Overtime::all()]);
    }


    // public static function overTime(Employee $employee)
    // {
    //     $current_t = new DateTime(date('H:i:s'));
    //     $start_t = new DateTime($employee->schedules->first()->time_out);
    //     $difference = $start_t->diff($current_t)->format('%H:%I:%S');

    //     $overtime = new Overtime();
    //     $overtime->emp_id = $employee->id;
    //     $overtime->duration = $difference;
    //     $overtime->overtime_date = date('Y-m-d');
    //     $overtime->save();
    // }
    
    public static function overTimeDevice($att_dateTime, Employee $employee)
    {
        
            $attendance_time =new DateTime($att_dateTime);
            $checkout = new DateTime($employee->schedules->first()->time_out);
            $difference = $checkout->diff($attendance_time)->format('%H:%I:%S');

            $overtime = new Overtime();
            $overtime->emp_id = $employee->id;
            $overtime->duration = $difference;
            $overtime->overtime_date = date('Y-m-d', strtotime($att_dateTime));
            $overtime->save();
        
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'employee_id' => 'required',
            'leave_type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'reason' => 'nullable|string',
        ]);

        // Create a new leave request
        Leave::create([
            'employee_id' => $request->input('employee_id'),
            'leave_type' => $request->input('leave_type'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'reason' => $request->input('reason'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Leave request submitted successfully.');
    }
}
