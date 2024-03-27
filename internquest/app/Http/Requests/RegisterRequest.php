<?php

namespace App\Http\Requests;

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
        return [
            'nom' => ['required','min:3'],
            'prenom' => ['required','min:4'],
            'email' => ['required','unique:users,email'],
            'password' => ['required', 'min:6'],
            'username' => ['required','unique:users,username'],
            'role' => ['required'],
            'centre' => ['required']
        ];
    }
}
