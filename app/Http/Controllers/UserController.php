<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Validations\Validation;
use App\Http\Requests\SubmitUpdateUserRequest;
use App\Http\Requests\SubmitCreateUserRequest;
use App\Http\Requests\OpenUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Sentry;


class UserController extends Controller
{

    
    public function index(){
        //Get users who is member
        $users = User::where('is_admin', '0')->get(); 
        return view('homepage.index')->with('users', $users);
    }        


    // public function deleteUser(OpenUserRequest $request) {
    //     //Delete the selected user
    //     User::find($request ->id)->delete();
    //     return redirect()->route('index');
    // }

    // public function openCreateForm(Request $request) {
    //     return view('create');
    // }

    // public function submitCreateForm(SubmitCreateUserRequest $request){
        
    //     $record = new User();
        
    //     $record->full_name = $request->fullname;
    //     $record->username = $request->username;
    //     $record->password = $request->password;        
    //     $record->is_admin = false;
    //     $record->created_by = Auth::user()->username;
    //     $record->save();
        
    //     return redirect()->route('index');
    // }

    // public function openUpdateForm(OpenUserRequest $request){
    //     //Load the selected user data into form
    //     $user = User::find($request->id);
    //     return view('update')->with('user', $user);
    // }

    // public function submitUpdateForm(SubmitUpdateUserRequest $request){
        
    //     $record = User::find($request->id);
        
    //     $record->full_name = $request->fullname;
    //     $record->username = $request->username;
    //     $record->password = $request->password;
    //     $record->save();
    //     return redirect()->route('index');
    // }
    

    public function getUserById(Request $request){
        $id = $request->id;
        if($id == null){
            return response()->json("The id is required", 404);
        }
        if (User::find($id) == null){
            return response()->json("Not found", 404);
        }
        $user = User::find($id);
        return response()->json($user, 200);
    }

    public function getAllUsers(){
        $users = User::all();
        
        if ($users == null) return response()->json("Not found", 404);
        
        return response()->json($users, 200);
    }

    public function createUser(Request $request){
        // Define rules for validation
        $rules = [
            'fullname' => 'bail|required|max:50',
            'username' => [
                'bail',
                'required',
                'unique:users,username'
            ], 
            'password' => 'bail|required|max:50|min:5',
            'passwordConfirmation' => 'bail|required|same:password'
        ];
        // validate inputs
        try {
            $this->validate($request, $rules);
        } catch (ValidationException $ex) {
            return response()->json([
                "status" => "error",
                "message" => "Inputs are incorrect",
                "errors" => "Alo alo: " + $ex->errors(),
            ], 422);
        }
        // Insert to db
        $record = new User();
        $record->full_name = $request->fullname;
        $record->username = $request->username;
        $record->password = $request->password;        
        $record->is_admin = false;
        //Todo: retrieve admin id
        $record->created_by = Auth::id();
        $record->save();
        // response to the client
        // return response()->json([
        //     "status" => "success",
        //     "message" => "Done",
        //     "data" => $record,
        // ], 201); 
        return Auth::id();
    }

    public function updateUser(Request $request){
        // Define rules for validation
        $rules = [
            'fullname' => 'bail|required|max:50',
            'username' => [
                'bail',
                'required',
                // 'unique:users,username,'.$this.route()->id
            ], 
            'password' => 'bail|required|max:50|min:5',
            'passwordConfirmation' => 'bail|required|same:password'
        ];
        // validate inputs
        try {
            $this->validate($request, $rules);
        } catch (ValidationException $ex) {
            return response()->json([
                "status" => "error",
                "message" => "Inputs are incorrect",
                "errors" => "Alo alo: " + $ex->errors(),
            ], 422);
        }
        // Update to db
        $record = User::find($request->id);
        $record->full_name = $request->fullname;
        $record->username = $request->username;
        $record->password = $request->password;        
        $record->save();
        //response to the client
        return response()->json([
            "status" => "success",
            "message" => "Done",
            "data" => $record,
        ], 201); 
    }

    public function deleteUser(Request $request){ 
        $id = $request->id;
        if($id == null) return response()->json("The id is required", 404);
        if (User::find($id) == null) return response()->json("Not found", 404);
        User::find($id)->delete();
        return response()->json($id, 200);
    }
}
