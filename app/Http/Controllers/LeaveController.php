<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Models\User;
use App\Models\Employee;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::all();
        return view('admin.leave', compact('leaves'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'nullable|string',
        ]);

        $leave = Leave::create([
            'employee_id' => $request->employee_id,
            'leave_type' => $request->leave_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        if ($leave) {
            return redirect()->route('admin.leave.index')->with('success', 'Leave request submitted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to submit leave request.');
        }
    }

}
