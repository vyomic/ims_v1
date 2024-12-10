<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Student;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function create(Request $request)
    {
        // Image uploader
        $firstName = $request->input('first_name');
        $cTime = Carbon::now()->format('YmdHis');
        $imageName = $firstName.$cTime.$request->file('photo')->getClientOriginalName();

        // Store the image
        $path = $request->file('photo')->storeAs('students', $imageName, 'public');

        // Create a new student record in the database
        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'dob' => $request->dob,
            'photo' => $path,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'class' => $request->class,
            'admit' => $request->admit,
            'cls_teacher' => $request->cls_teacher,
            'presence' => $request->presence,
            'leave' => $request->leave,
            'institute_id' => $request->institute_id,
            'add_by' => $request->add_by,
        ]);

        // Redirect with success message
        return redirect()->route('dashboard')->with('success', 'Student added successfully!');
    }

    public function read(Request $request)
    {
        // Fetch all students, or specific student if ID is provided
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $student = Student::findOrFail($id);

        // Update student details
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->dob = $request->dob;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->class = $request->class;
        $student->admit = $request->admit;
        $student->cls_teacher = $request->cls_teacher;
        $student->presence = $request->presence;
        $student->leave = $request->leave;
        $student->institute_id = $request->institute_id;
        $student->add_by = $request->add_by;

        // If there's a new photo
        if ($request->hasFile('photo')) {
            $cTime = Carbon::now()->format('YmdHis');
            $imageName = $student->first_name.$cTime.$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('students', $imageName, 'public');
            $student->photo = $path;
        }

        // Save updated student
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $student = Student::findOrFail($id);

        // Delete student record
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
};