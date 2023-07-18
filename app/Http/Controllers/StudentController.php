<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use App\Models\User;
use App\Models\ClearanceModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function index()
    {
        $modules = ClearanceModule::all();
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->cleared = false;
        $user->student->department;
        $cls = $user->student->clearance;
        $user->clearances = $modules;
        $cleared =  array_column($cls->toArray(), 'clearance_id');
        foreach ($user->clearances as $sc) {
            if (in_array($sc->id, $cleared)) {
                $sc->checked = true;
            } else {
                $sc->checked = false;
            }
        }
        $user->clearancePending = $modules->count() - $cls->count();
        if ($modules->count() == $cls->count()) {
            $user->cleared = true;
        }
        return view('welcome', compact('user'));
    }

    public function students()
    {
        $modules = ClearanceModule::all();
        $students = Student::all();
        foreach ($students as $student) {
            $cleared =  array_column($student->clearance->toArray(), 'clearance_id');
            $student->clearances = $modules;
            foreach ($student->clearances as $sc) {
                if (in_array($sc->id, $cleared)) {
                    $sc->checked = true;
                } else {
                    $sc->checked = false;
                }
            }
        }
        $departments = Department::all();
        return view('students.index', compact('students', 'departments', 'modules'));
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
