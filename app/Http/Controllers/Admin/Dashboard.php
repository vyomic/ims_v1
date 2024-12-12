<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\inStr;
use App\Models\Institute;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
class Dashboard extends Controller
{
    public function mainHandle(Request $request) {
        $currPath = $request->path();
        if ($currPath=='dashboard'){
            $reqType='dashboard';
            $user = auth()->user();
            $isNew = $user->isNew;
            $teacherCount = Teacher::count();
            $stuCount = Student::count();
            if ($isNew=='newAdmin'){
    
            // Redirect to '/reg' if the user is a new admin
            return redirect('/reg');
            }
            $showInstituteResponse = $this->showInstitute($request);
            return view('dashboard', ['institute' => $showInstituteResponse, 'reqType'=>$reqType, 'teacherCount'=>$teacherCount, 'stuCount'=>$stuCount]);
            // echo $currPath;
        
            }
        elseif ($currPath=='teacher/add'){

            $showInstituteResponse = $this->showInstitute($request);
            $addTeacherForm = $this-> addTeacherForm($request);

            return view('dashboard', [
                'institute' => $showInstituteResponse,
                'reqType' => $addTeacherForm
            ]);
            // echo $currPath;
        }
        elseif ($currPath=='teacher/view'){
            $showInstituteResponse = $this->showInstitute($request);
            $addTeacherForm = $this-> addTeacherForm($request);
            $user = auth()->user();
            $user_id = $user->id;  
            $teachers = Teacher::where('add_by', $user_id)->paginate(5);
            $showTeacher = 'readTeacher';

            return view('dashboard', [
                'institute' => $showInstituteResponse,
                'teachers' => $teachers,
                'reqType' => $showTeacher
            ]);

        // If no institute found, handle it
        if (!$teacher) {
            return redirect()->route('dashboard')->with('error', 'Institute not found.');
        }

        // Pass the institute data to the view
        return $teacher;
        }
        elseif ($currPath=='teacher/edit'){
            $showInstituteResponse = $this->showInstitute($request);
            $addTeacherForm = $this-> addTeacherForm($request);
            $user = auth()->user();
            $user_id = $user->id;  
            // $teacher = Teacher::where('add_by', $user_id)->get();
            $teacher = $this->editTeacherView($request);
            $showTeacher = 'editTeacher';

            return view('dashboard', [
                'institute' => $showInstituteResponse,
                'teacher' => $teacher,
                'reqType' => $showTeacher
            ]);
        }
        elseif ($currPath=='teacher/delete'){
            echo 'Delete Teacher';
        }
        elseif ($currPath=='staff/add'){
            echo 'Add Staff';
        }
        elseif ($currPath=='staff/read'){
            echo 'view Staff';
        }
        elseif ($currPath=='staff/update'){
            echo 'update Staff';
        }
        elseif ($currPath=='staff/delete'){
            echo 'Delete Staff';
        }
        elseif ($currPath=='student/add'){
            $showInstituteResponse = $this->showInstitute($request);
            $addStudentForm = $this-> addStudentForm($request);

            return view('dashboard', [
                'institute' => $showInstituteResponse,
                'reqType' => $addStudentForm
            ]);
        }
        elseif ($currPath=='student/view'){
            $showInstituteResponse = $this->showInstitute($request);
            $addStudentForm = $this-> addStudentForm($request);
            $user = auth()->user();
            $user_id = $user->id;  
            $student = Student::where('add_by', $user_id)->paginate(5);
            $showStudent = 'readStudent';

            return view('dashboard', [
                'institute' => $showInstituteResponse,
                'students' => $student,
                'reqType' => $showStudent
            ]);

        // If no institute found, handle it
        if (!$teacher) {
            return redirect()->route('dashboard')->with('error', 'Institute not found.');
        }

        // Pass the institute data to the view
        return $teacher;
        }
        elseif ($currPath=='student/update'){
            echo 'update student';
        }
        elseif ($currPath=='student/delete'){
            echo 'Delete student';
        }
        else{
            $reqType=$currPath;
            $user = auth()->user();
            $user_id = $user->id;
            $teacherCount = Teacher::count();
            $stuCount = Student::count();
            $showInstituteResponse = $this->showInstitute($request);
            if ($reqType=='manage'){
                $instituteId = Institute::where('user_id', $user_id)->pluck('institute_id')->first();
                $departments = inStr::where('instituteId', $instituteId)->get();
                return view('dashboard', ['institute' => $showInstituteResponse, 'reqType'=>$reqType, 'teacherCount'=>$teacherCount, 'stuCount'=>$stuCount, 'departments'=>$departments]);
            // Redirect to '/reg' if the user is a new admin
            // return redirect('/reg');
            }
            return view('dashboard', ['institute' => $showInstituteResponse, 'reqType'=>$reqType, 'teacherCount'=>$teacherCount, 'stuCount'=>$stuCount]);
        }
        
       
    }


    // add teacher view
    public function addTeacherForm(Request $request) {
        $reqType='addTeacherForm';
       
        return $reqType;
    }
    // add student view
    public function addStudentForm(Request $request) {
        $reqType='addStudentForm';
       
        return $reqType;
    }

    // edit teacher view
    public function editTeacherView(Request $request) {
        $reqId = $request->id;
        $teacher = Teacher::where('id', $reqId)->get();
        return $teacher;
    }

    public function showInstitute(Request $request) {
        $reqType='showInstitute';
        $user = auth()->user();
        $user_id = $user->id;   
        $isNew = $user->isNew;
        if ($isNew=='newAdmin'){

        // Redirect to '/reg' if the user is a new admin
        return redirect('/reg');
    
        }
        $institute = Institute::where('user_id', $user_id)->first();

        // If no institute found, handle it
        if (!$institute) {
            return redirect()->route('dashboard')->with('error', 'Institute not found.');
        }

        // Pass the institute data to the view
        return $institute;
    }
}
