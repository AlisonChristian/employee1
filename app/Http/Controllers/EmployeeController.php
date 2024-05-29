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
        $employees = Employee::all();
        $employees = Employee::leftJoin('employee_ids', 'employees.id', '=', 'employee_ids.emp_id')
                            ->select('employees.*', 'employee_ids.employee_no')
                            ->get();

        return view('admin.employee', compact('employees'));
    }

    public function store(Request $request)
    {
        // Validate request inputs
        $validatedData = $request->validate([
            'name' => 'required|string',
            'department' => 'required|string',
            'email' => 'nullable|email|unique:employees',
            'phone_number' => 'nullable|string',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
        ]);

        $validatedData['employee_id'] = (string) Str::uuid();
        
        // Create a new Employee instance and fill validated data
        $employee = Employee::create($validatedData);

        // Generate a unique employee number
        $employeeNo = $this->generateEmployeeId();

        // Debugging
        \Log::info('Employee ID: ' . $employee->id);
        \Log::info('Generated Employee No: ' . $employeeNo);

        // Create an Employee_ids record
        $employeeIdsRecord = Employee_ids::create([
            'employee_no' => $employeeNo,
            'emp_id' => $employee->id,
        ]);

        if (!$employeeIdsRecord) {
            return redirect()->back()->with('error', 'Failed to create employee ID.');
        }

        // Display success message
        return redirect()->route('employees')->with('success', 'Employee record created successfully!');
    }

    private function generateEmployeeId()
    {
        $latestEmployeeId = Employee_ids::latest('employee_no')->first();

        if ($latestEmployeeId) {
            // Increment the numeric part and keep the year part the same
            $numberPart = (int) substr($latestEmployeeId->employee_no, 0, 4);
            $yearPart = substr($latestEmployeeId->employee_no, 4, 2);
            $numberPart++;
        } else {
            // If no employee ID exists, start with 1 for the numeric part and current year for the year part
            $numberPart = 1;
            $yearPart = date('y');
        }

        // Create a new employee ID by concatenating the incremented numeric part and year part
        $newEmployeeId = str_pad($numberPart, 4, '0', STR_PAD_LEFT) . $yearPart;

        return $newEmployeeId;
    }

    public function update(Request $request, $id)
    {
        // Fetch the employee by ID
        $employee = Employee::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'department' => 'required|string',
            'email' => 'nullable|email|unique:employees,email,' . $employee->id,
            'phone_number' => 'nullable|string',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
        ]);

        // Update the employee
        $employee->update($validatedData);

        // Redirect with a success message
        return redirect()->route('employees')->with('success', 'Employee updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        // Find the employee record by ID
        $employee = Employee::find($id);

        // Check if the employee exists
        if ($employee) {
            // Attempt to delete the employee record
            try {
                $deleted = $employee->delete();
                if ($deleted) {
                    return redirect()->route('employees')->with('success', 'Employee deleted successfully.');
                } else {
                    return redirect()->route('employees')->with('error', 'Failed to delete employee.');
                }
            } catch (\Exception $e) {
                // Log the error for debugging
                \Log::error($e);
                return redirect()->route('employees')->with('error', 'An error occurred while deleting the employee.');
            }
        } else {
            return redirect()->route('employees')->with('error', 'Employee not found.');
        }
    }
}
