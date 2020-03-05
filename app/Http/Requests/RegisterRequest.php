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
            'email' => 'required|email|unique:users|max:255',
            'username' => 'required|unique:users|max:255',
            'password' => 'required|min:8',
            // 'firstName' => 'required',
            // 'lastName' => 'required',
            // 'postalCode' => 'required',
            // 'city' => 'required',
            // 'street' => 'required',
            // 'housenumber' => 'required',
            // 'privacy' => 'accepted',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Please type in your Email',
            'email.unique' => 'This Mail is already registered',
            'email.email' => 'This Mail is incorrect',
            'username.required' => 'Please type in your Username',
            'username.unique' => 'This Username is already registered',
            'password.required' => 'Please type in your Password',
        ];
    }
}
