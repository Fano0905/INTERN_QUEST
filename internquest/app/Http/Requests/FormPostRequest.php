<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class FormPostRequest extends FormRequest
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
            'title' => ['required', 'min:6'],
            'slug' => ['required', 'min:4', 'regex:/^[0-9a-z\-]+$/', Rule::unique('posts')->ignore($this->route()->parameter('post'))],
            'content' => ['required|min:4'],
            'category_id' => ['exists:categories,id'], // Ajoutez cette ligne pour valider le champ category_id
            'tags' => ['array', 'exists:tags_id', 'required'],
            'image' => ['image', 'max:2000']
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->input('slug') ?: str::slug($this->input('title'))
        ]);
    }
}
