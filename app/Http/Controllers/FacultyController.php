<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::all();
        return view('faculties.index', compact('faculties'));
    }

    public function create(Request  $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:faculties'],
            'dean' => ['required', 'string', 'max:255']
        ]);
        $user = Faculty::create([
            'name' => $validatedData['name'],
            'dean' => $validatedData['dean'],
        ]);
        toast('Faculty Created Successfully', 'success');
        return redirect("/faculties");
    }

    public function detail($id)
    {
        $faculty = Faculty::find($id);
        return view('faculties/detail', compact('faculty'));
    }
}
