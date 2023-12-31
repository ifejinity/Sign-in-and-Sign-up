<?php

namespace App\Http\Requests;

use App\Rules\ReCaptcha;
use Illuminate\Foundation\Http\FormRequest;

class SignIn extends FormRequest
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
            'username' => 'required|exists:users,username',
            'password' => 'required',
            'recaptcha' => ['required', new ReCaptcha]
        ];
    }
    
    public function messages(): array
    {
        return [
            'username.exists' => "User doesn't exist.",
        ];
    }
}
