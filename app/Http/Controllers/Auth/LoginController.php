<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Designation;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function SignUp(){
        $designations = Designation::get();
        return view('registration',compact('designations'));
    }
    public function SaveNewUsers(Request $request){
        $input = $request->all();

        $data = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['contact_number']),
            'role' => $input['role'],
        ]);
        if ($input['role'] != 1) {
            $data = UserDetails::create([
                'Name' => $input['name'],
                'email' => $input['email'],
                'contact_number' => $input['contact_number'],
                'contact_number1' => $input['contact_numberr'],
                'address' => $input['address'],
                'fk_int_designation_id' => $input['designation'],
                'user_status' => 1,
                'fk_int_user_id' => $data['id'],
            ]);
        }
        
        return redirect()->route('register-form')->with('message','Data Created Successfully!');
        
    }
    public function getLogin(){
        return view('admin.login');
    }

    public function postLogin(Request $request){
        //try {
            $message = trans('messages.invalid_login_credentials');
            $rememberMe = false;
            $user = User::where('email', $request->email)->first();
            if (!empty($user)) {
                session(['employee_name' => $user->name]);
                session(['employee_email' => $user->email]);
                session(['employee_role' => $user->role]);
                $hashed = Hash::make($request->password);
                    if (Hash::check($request->password, $user->password)) {
                        Auth::loginUsingId($user->id, $rememberMe);
                        if ($user->role == '1') {
                           return redirect()->route('dashboard');
                        }
                        else{
                            return redirect()->route('user-dashboard');
                        }
                    }
					else {
            			return back()->withErrors(['email' => 'Your provided credentials do not match in our records.',])->onlyInput('email');
					}
            }
			else {
				return back()->withErrors(['email' => 'Your provided credentials do not match in our records.',])->onlyInput('email');
			}
    }
    public function logoutUser(Request $request){
       // $user = User::where('emple_id',Session::get('employee_role'))->where('status', 1)->first();
        Auth::logout();
        
        
        return redirect('/');
    }


    

}