<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;

class EmployeeController extends Controller
{
    public function index()
    {
        // Fetch employees with their related users and departments
        $employees = Employee::with(['user', 'department'])->paginate(10);
        
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        $users = User::select('id', 'name')->get();
        $departments = Department::select('id', 'name')->get();

        return view('admin.employees.create', compact('users', 'departments'));
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data employee...
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $users = User::select('id', 'name')->get();
        $departments = Department::select('id', 'name')->get();

        return view('admin.employees.edit', compact('employee', 'users', 'departments'));
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data employee...
    }

    public function destroy($id)
    {
        // Hapus employee...
    }
}
