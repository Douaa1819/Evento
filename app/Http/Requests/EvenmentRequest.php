<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvenmentRequest extends FormRequest
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
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            'lieu' => 'required|string',
            'organizateur_id' => 'required|exists:organizateurs,id',
            'place_disponible' => 'required|integer',
            'date' => 'required|date', 
            'validation' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
}
