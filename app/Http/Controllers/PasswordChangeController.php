<?php

#app\Http\Controllers\HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class PasswordChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware("throttle:10,2");

    }

    public function showChangePasswordGet() {
        return view('password-change');
    }

    public function changePasswordPost(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with Our database.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        // $user= User::find(Auth::id());
      
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
     
      //  $result = (new MailController)->index();


        return redirect()->back()->with("success","Password successfully changed!");
    }
}








