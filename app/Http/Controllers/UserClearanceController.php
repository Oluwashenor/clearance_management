<?php

namespace App\Http\Controllers;

use App\Models\UserClearance;
use Illuminate\Http\Request;

class UserClearanceController extends Controller
{
    public function clear(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => ['required'],
        ]);

        UserClearance::where('student_id', $validatedData['student_id'])->delete();
        if (!empty($request['clearance'])) {
            foreach ($request['clearance'] as $c) {
                UserClearance::create([
                    'student_id' => $validatedData['student_id'],
                    'clearance_id' => $c
                ]);
            }
        }
        toast('Updated Successfully', 'success');
        return redirect("/students/index");
    }
}
