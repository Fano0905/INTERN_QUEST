<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class OffreRequest extends FormRequest
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
        return ([
            'title' => 'required',
            'location' => 'required',
            'class' => 'required',
            'duration' => 'required',
            'remuneration' => 'required',
            'date_offer' => ['required'],
            'place_offered' => 'required',
            'description' => ['required', 'min:200']
        ]);
    }
}
