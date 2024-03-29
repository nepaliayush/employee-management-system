<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    public function create()
    {
        return view('employee.create');
    }
    public function getEmployee()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    public function addEmployee(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            // Add more validation rules as needed
        ]);

        // Create and save the employee
        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->department = $request->input('department');
        $employee->designation = $request->input('designation');
        $employee->salary = $request->input('salary');
        // Add more fields as needed
        $employee->save();

        // Redirect back or to a success page
        return redirect()->route('employee.index')->with('success', 'Employee added successfully!');
    }

    public function viewLeaves()
    {
        $user = auth()->user();
        if ($user->employee) {
            $availableLeaves = $user->employee->available_leaves;
            return view('leave.earnedleaves', compact('availableLeaves'));
        } else {
            // Handle the case where the user doesn't have an associated employee record
            // For example, redirect the user to a page indicating that they need to contact HR.
        }
    }

}
