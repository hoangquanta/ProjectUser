<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitCreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [            
            'fullname' => 'bail|required|max:50',
            'username' => [
                'bail',
                'required',
                'unique:project_users,username'
            ], 
            'password' => 'bail|required|max:50|min:5',
            'passwordConfirmation' => 'bail|required|same:password'
            //
        ];
    }
}
