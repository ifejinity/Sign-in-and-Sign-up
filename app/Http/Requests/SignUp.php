<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUp extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'username' => 'required|unique:users,username|between:6,20',
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ];
    }

    public function messages(): array
    {
        return [
            
        ];
    }
}
