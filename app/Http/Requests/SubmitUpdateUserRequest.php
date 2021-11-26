<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitUpdateUserRequest extends FormRequest
{
    protected function prepareForValidation() 
    {
        $this->merge(['id' => $this->route('id')]);
    }

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
            'id' => 'bail|required|exists:project_users,id',
            'fullname' => 'bail|required|max:50',
            'username' => [
                'bail',
                'required',
                'unique:project_users,username,'.$this->route('id')
            ], 
            'password' => 'bail|required|max:50|min:5',
            'passwordConfirmation' => 'bail|required|same:password'
        ];
    }
}
