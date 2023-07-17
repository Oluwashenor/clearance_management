<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:departments'],
            'hod' => ['required', 'string', 'max:255'],
            'faculty_id' => ['required']
        ]);
        $user = Department::create([
            'name' => $validatedData['name'],
            'hod' => $validatedData['hod'],
            'faculty_id' => $validatedData['faculty_id'],
        ]);
        toast('Department Created Successfully', 'success');
        return back();
    }

    public function delete($id)
    {
        $department = Department::find($id);
        $department->delete();
        toast('Department Deleted Successfully', 'success');
        return back();
    }
}
