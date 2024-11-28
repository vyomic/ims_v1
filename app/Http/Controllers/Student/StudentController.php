<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function create(Request $request){
        echo 'add Student';
    }
   
    public function read(Request $request){
        echo 'read Student';
    }
    public function update(Request $request){
        echo 'update Student';
    }
    public function delete(Request $request){
        echo 'delete Student';
    }
}
