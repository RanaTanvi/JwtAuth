<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return[
            'username.required' => 'Username field is required.',
             'password.required' => 'password field is required.',
             'password.min'      => 'Password must be minimum of 5 characters',

        ];
    }
}
