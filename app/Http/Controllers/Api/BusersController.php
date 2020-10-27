<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buser;
use App\Http\Resources\BuserResource;
use App\Http\Resources\BuserResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class BusersController extends Controller
{
    // Show All users
    public function index(): BuserResourceCollection
    {
        return new BuserResourceCollection( Buser::paginate());
    }

    // Show Specific Users
    public function show(Buser $buser): BuserResource
    {
        return new BuserResource($buser);
    }

    // SignUp For Buser
    public function register(Request $request)
    {

        $request->validate([
            'fullname'  => 'required',
            'phone' => 'required|min:11|numeric',
            'email' => 'unique:busers,email,required',
            'password' => ['required','string','min:8'],
            'address' => 'required',
            'days' => 'required',
            'energy_units' => 'required',
            'weight_units' => 'required',
            'height_units' => 'required',
            'activity_level' => 'required',
            'user' => 'required',
            'coach' => 'required',
            'tnc' => 'required'
        ]);
        
        $buser = Buser::create($request->all());
    
        return response()->json($buser, 201);
    }

    // Update Buser Profile
    public function update(Buser $buser, Request $request): BuserResource
    {
        $buser->update($request->all());
        return new BuserResource($buser);
    }
    
    //Login for Buser
    public function login(Request $request)
    {   
        if($request->email != null && $request->password !=null)
        {
            $validated = $request->validate([
                'email' => 'required|email',
                'password' => 'required|string'
            ]);
            if($validated == true) 
            {   
               $uemail = Buser::where('email', $request->email)->firstOrFail();
               $upass = Buser::where('password', $request->password)->firstOrFail();
               $buser = DB::table('busers')->where('email', $uemail);
               return response()->json(['success' => true, 'loginDetails' => $buser]);
            } 
        }else {
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }  
    }
    // Logout For Buser
    public function logout(Request $request) {      
        Auth::logout();
        return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);

    }
    // Forpassword For Buser
    public function reset(Request $request) {
        
        $validateData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|string|confirmed',
            'password_confirmation' => 'required|min:8|same:password'
        ]);
        $uemail = Buser::where('email',$request->email)->value('email');

        if($validateData && $uemail == $request->email){
            $buser = Buser::where('email',$request->email)
                            ->update($request->only('password'));
            return response()->json(['success' => true,"message" => "Your Password has been changed"]);
        }else {
            $error_message = "Your email address was not found.";
            return response()->json(['success' => false, 'error' => ['email'=> $error_message]], 401);
        }
    }
}
