<?php

namespace App\Http\Controllers\Teacher; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\teacher;

class TeacherController extends Controller
{
    public function create(Request $request){
        // echo $request;
        // $request-> = $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'father_name' => 'required|string|max:255',
        //     'dob' => 'required|date',
        //     'phone' => 'required|string|max:20',
        //     'email' => 'required|email|unique:teacher,email',  // Ensure unique email
        //     'address' => 'required|string',
        //     'max_qualification' => 'required|string',
        //     'doj' => 'required|date',
        //     'subject' => 'required|string',
        //     // 'institute_id' => 'required|exists:institute,institute_id',  // Ensure the institute exists
        //     // 'add_by' => 'required|exists:users,id',  // Ensure the user exists
        //     'class' => 'required|string',
        //     'schedule' => 'required|string',
        // ]);

        // Step 2: Create a new teacher record in the database
        $teacher = Teacher::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'max_qualification' => $request->max_qualification,
            'doj' => $request->doj,
            'subject' => $request->subject,
            'institute_id' => $request->institute_id,
            'add_by' => $request->add_by,
            'experience' =>$request->experience,
            'last_employe' => $request->last_employe,
            'class' => 'class',
            'schedule' => '9 to 5',
        ]);

        // Step 3: Redirect with a success message
        return redirect()->route('dashboard')->with('success', 'Teacher added successfully!');
    }
   
    public function read(Request $request){
        echo 'read teacher';
    }
    public function update(Request $request){
        echo 'update teacher';
    }
    public function delete(Request $request){
        echo 'delete teacher';
    }
}
