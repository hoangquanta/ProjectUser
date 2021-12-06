<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    //
    public function login(){
        return view('login');
    }

    public function submitLogin(LoginRequest $request){
        
        $user = User::where('username',$request->username)->get()->first();

        //Check is_admin
        if ($user->is_admin == 1){
            //Check if password match username
            if(Auth::attempt($request->only('username', 'password'))){

                return redirect()->intended()->with('message', 'Signed in successful');
            }
        }
        //$tokenResult = $user->createToken('authToken')->plainTextToken;
        
        return redirect()->route('login')->with('message','This account is unauthorized');
    }

    public function logout(Request $request){
        Session::flush();
        Auth::logout();

        return redirect('login');
    }

    public function createAdmin(){

        $admin = new User();
        $admin->username = "admin02";
        $admin->password = Hash::make("admin");
        $admin->full_name = 'VinaTakeuchi02';
        $admin->is_admin = 1;
        $admin->created_by = null;
        $admin->save();
        return redirect()->route('login');
    }
}
