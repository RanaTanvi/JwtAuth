<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'password' => 'min:5|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:5'
        ];
    }

    public function messages()
    {
        return [
            'username.required'=>'Username field is required.',
            'password.min'=>'Password must be minimum of 5 characters.',
            'password.same'=>'Password and confirmation password must match.'

        ];
    }
}
