<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ProjectUsers;

class SubmitUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {        
        return [
            'id' => 'exists:project_users',
            'fullname' => 'bail|required|max:50',
            'username' => 'bail|required|max:50|unique:App\Models\ProjectUsers,username',
            'password' => 'bail|required|max:50|min:8',
            'passwordConfirmation' => 'bail|required|same:password'
        ];
    }
}
