<?php

namespace App\Http\Controllers\Institute;

use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
class InstituteController extends Controller
{
public function regForm()
{
    // Retrieve the logged-in user data (you can also check it from a specific model or table)
    $user = auth()->user();
    // Check if the user is new (replace 'isnew' with the appropriate column)
    $isNew = $user->isNew; // Assuming 'isnew' is a column in the users table
    $user_name = $user->name;
    $user_email = $user->email;
    $user_id = $user->id;    
    return view('tools.addInstitute.createInstitute', compact('isNew', 'user_name', 'user_email', 'user_id'));
}

    // Store a new institute in the database
    public function store(Request $request)
    {
        
        $user = auth()->user();
        // Check if the user is new (replace 'isnew' with the appropriate column)
        $isNew = $user->isNew; // Assuming 'isnew' is a column in the users table
        $user_name = $user->name;
        $user_email = $user->email;
        $user_id = $user->id;
        $instname = $request->institute_name;
        $insttype = $request->institute_type;
        $instcour_array = $request->input('course_domain');
        $instcour = json_encode($instcour_array); 
        $instspec_array = $request->input('specialization');
        $instspec = json_encode($instspec_array);
        $instaffl = $request->affiliation;
        $instmail = $request->email;
        $address = $request->address;
        
        // Create a new Institute instance and fill data
        $institute = Institute::create([
            'inst_name' => $instname,
            'inst_type' => $insttype,
            'inst_course' =>$instcour,
            'inst_spec' => $instspec,
            'inst_affil' => $instaffl,
            'inst_email' =>$instmail,
            'phone' => 'phone',
            'address' => $address,
            'website' => 'website',
            'owner_name' => $user_name,           
            'owner_email' => $user_email,
            'user_id' => $user_id,
        ]);

        // Find the user by ID
        $user->update(['isNew' => 'oldAdmin']);
         return Redirect::route('dashboard')->with('status', 'Istitute information-updated');
    }

}
