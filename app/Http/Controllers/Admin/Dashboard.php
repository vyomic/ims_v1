<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Institute;
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
            if ($isNew=='newAdmin'){
    
            // Redirect to '/reg' if the user is a new admin
            return redirect('/reg');
            }
            $showInstituteResponse = $this->showInstitute($request);
            return view('dashboard', ['institute' => $showInstituteResponse, 'reqType'=>$reqType]);
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
        elseif ($currPath=='teacher/read'){
            echo 'view Teacher';
        }
        elseif ($currPath=='teacher/update'){
            echo 'update teacher';
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
            echo 'Add student';
        }
        elseif ($currPath=='student/read'){
            echo 'view student';
        }
        elseif ($currPath=='student/update'){
            echo 'update student';
        }
        elseif ($currPath=='student/delete'){
            echo 'Delete student';
        }
        
       
    }


    // add teacher view
    public function addTeacherForm(Request $request) {
        $reqType='addTeacherForm';
        return $reqType;
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
