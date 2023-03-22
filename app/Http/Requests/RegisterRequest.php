<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|unique:users,email',
            'f_name' => 'required',
            'l_name' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages()
    {
    // use trans instead on Lang
        return [
            'f_name.required' => 'First name field is required.',
            'l_name.required' => 'Last name field is required.',
            'email.required' => 'Email field is required.',
            'password.same'=>'password are not the same password must match same value',
            'password_confirmation'=>'confirm password length must be greater than 8 characters',
        ];
    }

}
