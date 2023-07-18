<?php

namespace App\Http\Controllers;

use App\Models\ClearanceModule;
use Illuminate\Http\Request;

class ClearanceModuleController extends Controller
{
    public function index()
    {
        $modules = ClearanceModule::all();
        return view('clearance.index', compact('modules'));
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:clearance_modules']
        ]);
        $user = ClearanceModule::create([
            'name' => $validatedData['name'],
        ]);
        toast('Module Created Successfully', 'success');
        return back();
    }
}
