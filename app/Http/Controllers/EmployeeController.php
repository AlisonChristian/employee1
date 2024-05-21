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

        $validatedData['employee_id'] = Str::uuid();
        
        // Create a new Employee instance
        $employee = new Employee();
        
        // Assign validated data to the Employee instance
        $employee->fill($validatedData);
        
        // Save the employee record
        $employee->save();

        // Generate a unique employee ID
        $employeeId = $this->generateEmployeeId();

        // Debugging
        \Log::info('Employee ID: ' . $employee->id);
        \Log::info('Generated Employee No: ' . $employeeId);

        // Create an Employee_ids record
        $employeeIdsRecord = Employee_ids::create([
            'employee_no' => $employeeId,
            'emp_id' => $employee->id,
        ]);

        if (!$employeeIdsRecord) {
            return redirect()->back()->with('error', 'Failed to create employee ID.');
        }

        // Display success message
        return redirect()->route('employees.index')->with('success', 'Employee record created successfully!');
    }

    private function generateEmployeeId() {
        $latestEmployeeId = Employee_ids::latest('employee_no')->first();

        if ($latestEmployeeId) {
            // Increment the numeric part and keep the year part same
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


    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'department' => 'required|string',
            'email' => 'nullable|email|unique:employees,email,' .    $employee->id,
            'phone_number' => 'nullable|string',
            'gender' => 'nullable|in:male,female,other',
            'address' => 'nullable|string',
        ]);

        $employee->update([
            'name' => $request->name,
            'department' => $request->department,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'address' => $request->address,
        ]);

        Alert::success('Success', 'Employee Record has been updated successfully!');

        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        Alert::success('Success', 'Employee Record has been deleted successfully!');
        return redirect()->route('employees.index');
    }
}
