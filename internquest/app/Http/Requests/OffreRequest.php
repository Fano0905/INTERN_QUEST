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
            'titre' => 'required',
            'localite' => 'required',
            'type_promo' => 'required',
            'duree' => 'required',
            'remuneration' => 'required',
            'date_offre' => ['required'],
            'place_offerte' => 'required',
            'description' => ['required', 'min:200']
        ]);
    }
}
