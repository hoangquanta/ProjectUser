<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectUsers;
use App\Validations\Validation;
use App\Http\Requests\SubmitUserRequest;
use App\Http\Requests\OpenUserRequest;

class ProjectUsersController extends Controller
{
    
    public function index(){
        //Get users who is member
        $users = ProjectUsers::where('is_admin', '=', '0')->get(); 
        return view('homepage')->with('users', $users);
    }

    public function deleteUser(Request $request) {
        //Xác định ID từ request và dùng Model xóa trong database
        $id = $request ->id;
        ProjectUsers::find($id)->delete();

        return redirect()->route('users.show');
    }

    public function openCreateForm(Request $request) {
        return view('create');
    }

    public function submitCreateForm(SubmitUserRequest $request){
        
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
                        
        $user = ProjectUsers::find($request->id);
        return view('update')->with('user', $user);
    }

    public function submitUpdateForm(SubmitUserRequest $request){
        
        $record = ProjectUsers::find($request->id);
        
        $record->full_name = $request->fullname;
        $record->username = $request->username;
        $record->password = $request->password;        
        $record->is_admin = false;
        //todo: 
        $record->save();
        return redirect()->route('users.show');
    }
}
