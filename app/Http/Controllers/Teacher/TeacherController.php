<?php

namespace App\Http\Controllers\Teacher; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Teacher;
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
        $id= $request->id;
        $teacher = Teacher::findOrFail($id);
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->father_name = $request->father_name;
        $teacher->dob = $request->dob;
        $teacher->phone = $request->phone;
        // $teacher->email = $request->email;
        $teacher->address = $request->address;
        // $teacher->max_qualification = $request->max_qualification;
        // $teacher->doj = $request->doj;
        $teacher->subject = $request->subject;
        $teacher->institute_id = $request->institute_id;
        $teacher->add_by = $request->add_by;
        // $teacher->experience = $request->experience;
        // $teacher->last_employe = $request->last_employe;

        if ($request->hasFile('photo')) {
            $cTime = Carbon::now()->format('YmdHis');
            $imageName = $teacher->first_name.$cTime.$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('teacher', $imageName, 'public');
            $teacher->photo = $path;
        }

        $teacher->save();
    }
    public function delete(Request $request){
        echo 'delete teacher';
    }
}
