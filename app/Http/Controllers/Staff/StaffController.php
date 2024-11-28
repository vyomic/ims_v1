<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class StaffController extends Controller
{
    public function create(Request $request){
        echo 'add Staff';
    }
   
    public function read(Request $request){
        echo 'read Staff';
    }
    public function update(Request $request){
        echo 'update Staff';
    }
    public function delete(Request $request){
        echo 'delete Staff';
    }
}
