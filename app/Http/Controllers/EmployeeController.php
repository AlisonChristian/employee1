<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Employee_ids;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function index()
    {
        // Fetch all employees with their corresponding employee numbers
        $employees = Employee::leftJoin('employee_ids', 'employees.id', '=', 'employee_ids.emp_id')
                            ->select('employees.*', 'employee_ids.employee_no')
                            ->get();

        return view('admin.employee', compact('employees'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string',
        'department' => 'required|string',
        'email' => 'nullable|email|unique:employees',
        'phone_number' => 'nullable|string',
        'gender' => 'nullable|in:male,female,other',
        'address' => 'nullable|string',
    ]);

    // Create a new Employee instance
    $employee = new Employee();
    
    // Assign validated data to the Employee instance
    $employee->fill($validatedData);
    
    // Save the employee record
    $employee->save();

    // Display success message
    return redirect()->route('employees')->with('success', 'Employee record created successfully!');
}


    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'department' => 'required|string',
            'email' => 'nullable|email|unique:employees,email,' . $employee->id,
            'phone_number' => 'nullable|string',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
        ]);

        $employee->update($validatedData);

        return redirect()->route('employees')->with('success', 'Employee updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            try {
                $deleted = $employee->delete();
                if ($deleted) {
                    return redirect()->route('employees')->with('success', 'Employee deleted successfully.');
                } else {
                    return redirect()->route('employees')->with('error', 'Failed to delete employee.');
                }
            } catch (\Exception $e) {
                \Log::error($e);
                return redirect()->route('employees')->with('error', 'An error occurred while deleting employee.');
            }
        } else {
            return redirect()->route('employees')->with('error', 'Employee not found.');
        }
    }
}
