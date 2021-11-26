<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectUsers;
use App\Validations\Validation;
use App\Http\Requests\SubmitUpdateUserRequest;
use App\Http\Requests\SubmitCreateUserRequest;
use App\Http\Requests\OpenUserRequest;

class ProjectUsersController extends Controller
{
    
    public function index(){        
        //Get users who is member
        $users = ProjectUsers::where('is_admin', '=', '0')->get(); 
        return view('homepage')->with('users', $users);
    }

    public function deleteUser(OpenUserRequest $request) {
        //Delete the selected user
        ProjectUsers::find($request ->id)->delete();
        return redirect()->route('users.show');
    }

    public function openCreateForm(Request $request) {
        return view('create');
    }

    public function submitCreateForm(SubmitCreateUserRequest $request){
        
        $record = new ProjectUsers();
        
        $record->full_name = $request->fullname;
        $record->username = $request->username;
        $record->password = $request->password;        
        $record->is_admin = false;
        //todo: 
        $record->created_by = 'on process...';
        $record->save();
        
        return redirect()->route('users.show');
    }

    public function openUpdateForm(OpenUserRequest $request){
        //Load the selected user data into form
        $user = ProjectUsers::find($request->id);
        return view('update')->with('user', $user);
    }

    public function submitUpdateForm(SubmitUpdateUserRequest $request){
        
        $record = ProjectUsers::find($request->id);
        
        $record->full_name = $request->fullname;
        $record->username = $request->username;
        $record->password = $request->password;         
        $record->save();
        return redirect()->route('users.show');
    }
}
