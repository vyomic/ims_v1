<?php

namespace App\Http\Controllers\Teacher; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\teacher;
use Carbon\Carbon;

class TeacherController extends Controller
{
    public function create(Request $request){
        // image uploader
        $firstName = $request->input('first_name');
        // $dob = $request->input('dob');
        $cTime = Carbon::now()->format('YmdHis');
        $imageName = $firstName.$cTime.$request->file('photo')->getClientOriginalName();

        // Store the image
        $path = $request->file('photo')->storeAs('teacher', $imageName, 'public');

        // Step 2: Create a new teacher record in the database
        $teacher = Teacher::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'dob' => $request->dob,
            'photo'=> $path,
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
        
    }
    public function update(Request $request){
        echo 'update teacher';
    }
    public function delete(Request $request){
        echo 'delete teacher';
    }
}
