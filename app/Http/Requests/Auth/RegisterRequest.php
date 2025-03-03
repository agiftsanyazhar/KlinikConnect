<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Pria,Wanita',
            'date_of_birth' => 'required|date',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'role_id' => 'required|exists:roles,id',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            '*.required' => 'The :attribute field is required.',
            '*.string' => 'The :attribute must be a string.',
            '*.min' => 'The :attribute must be at least :min characters.',
            '*.max' => 'The :attribute must be at most :max characters.',
            '*.email' => 'The :attribute must be a valid email address.',
            '*.unique' => 'The :attribute has already been taken.',
            '*.in' => 'The :attribute field is invalid.',
            '*.date' => 'The :attribute field must be a valid date.',
            '*.exists' => 'The :attribute field is invalid.',
        ];
    }
}
