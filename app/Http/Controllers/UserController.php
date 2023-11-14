<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Designation;
use App\Models\UserDetails;
use Response;
use Session;
use Validator;

class UserController extends Controller
{
    
    public function dashboard()
    {
        if(Auth::check())
        {
            $DesiCount = Designation::count();
            $userCount = UserDetails::count();
            $activeUserCount = UserDetails::where('user_status',1)->count();
            $inactiveUserCount = UserDetails::where('user_status',0)->count();

            return view('dashboard',compact('DesiCount','userCount','activeUserCount','inactiveUserCount'));
        }      

    } 
    public function UserDashboard()
    {
        if(Auth::check())
        {
            $user = auth()->user();
            $DesiCount = Designation::count();
            $userCount = UserDetails::count();
            $activeUserCount = UserDetails::where('user_status',1)->count();
            $inactiveUserCount = UserDetails::where('user_status',0)->count();

            return view('user_dashboard',compact('DesiCount','userCount','activeUserCount','inactiveUserCount','user'));
        }      

    } 
    public function CreateDesignations(){
        return view('create-designation');
    }
    public function SaveDesignations(Request $request){
        $input = $request->all();
        if (isset($input['designation_id'])) {
            $data = Designation::where('pk_int_designation_id',$input['designation_id'])
                ->update([
                    'designation' => $input['designation'],
                    'status' => $input['status'],
                ]);
            return response()->json([
              'success'   => 1,
              'message'   => "Updated Successfully!",
            ]);
        }
        else{
            $data = Designation::create([
                    'designation' => $input['designation'],
                    'status' => $input['status'],
                ]);
            return response()->json([
              'success'   => 1,
              'message'   => "Created Successfully!",
            ]);
        }
        
    }
    public function DesignationLists(){
        return view('designations');
    }
    public function GetDesignations(){
        $designations = Designation::get();
        return response()->json([
          'success'   => 1,
          'data'   => $designations,
        ]);
    }
    public function EditDesignation($id){
       $data = Designation::where('pk_int_designation_id',$id)->first();
        
       return view('create-designation',compact('data'));
    }


    public function CreateUsers(){
        $designations = Designation::get();
        return view('create-users',compact('designations'));
    }
    public function SaveUsers(Request $request){
        $input = $request->all();
        if (isset($input['user_id'])) {
            $user = UserDetails::where('pk_int_user_dtls_id',$input['user_id'])
                                ->select('fk_int_user_id')->first();
            $data = User::where('id',$user['fk_int_user_id'])
                        ->update([
                            'name' => $input['name'],
                            'email' => $input['email'],
                            'password' => Hash::make($input['contact_number']),
                        ]);
            $data = UserDetails::where('pk_int_user_dtls_id',$input['user_id'])
                                ->update([
                                    'Name' => $input['name'],
                                    'email' => $input['email'],
                                    'contact_number' => $input['contact_number'],
                                    'contact_number1' => $input['contact_numberr'],
                                    'address' => $input['address'],
                                    'fk_int_designation_id' => $input['designation'],
                                    'user_status' => $input['status'],
                                ]);
            return response()->json([
              'success'   => 1,
              'message'   => "Updated Successfully!",
            ]);
        }
        else{
            $data = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['contact_number']),
            ]);
            $data = UserDetails::create([
                'Name' => $input['name'],
                'email' => $input['email'],
                'contact_number' => $input['contact_number'],
                'contact_number1' => $input['contact_numberr'],
                'address' => $input['address'],
                'fk_int_designation_id' => $input['designation'],
                'user_status' => $input['status'],
                'fk_int_user_id' => $data['id'],
            ]);
            return response()->json([
              'success'   => 1,
              'message'   => "Created Successfully!",
            ]);
        }
        
    }
    public function UsersList(){
        return view('users');
    }
    public function GetUsers(){
        $designations = Designation::get();
        $Users = UserDetails::with('designation')
                            ->orderBy('name')
                            ->get();
        
        return response()->json([
          'success'   => 1,
          'data'   => $Users,
          'designations'   => $designations,
        ]);
    }
    public function EditUserDtls($id){
        $designations = Designation::get();
        $data = UserDetails::where('pk_int_user_dtls_id',$id)->first();
        
       return view('create-users',compact('data','designations'));
    }
    public function SearchUsers(Request $request){
        $input = $request->all();
        
        $designations = Designation::get();
        $query = UserDetails::with('designation');
                            if ($input['designation']) {
                                $query->where('fk_int_designation_id',$input['designation']);
                            }
                            if ($input['status']) {
                                $query->where('user_status',$input['status']);
                            }
                            $query->orderBy('name');
                           $Users = $query->get();
        
        return response()->json([
          'success'   => 1,
          'data'   => $Users,
          'designations'   => $designations,
        ]);
    }
}
