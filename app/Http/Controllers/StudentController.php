<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function students()
    {
        $students = Student::all();
        $departments = Department::all();
        return view('students.index', compact('students', 'departments'));
    }


    public function edit(Request $request)
    {
        $validatedData = $request->validate([
            'id' => ['required'],
            'department_id' => ['required'],
        ]);
        $student = Student::find($validatedData['id']);
        $student->department_id = $validatedData['department_id'];
        $student->save();
        toast('Student Updated Successfully', 'success');
        return redirect("/students/index");
    }
}
