<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLogementRequest extends FormRequest
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
            'nom' => ['required', 'min:2', 'max:50'],
            'capacite' => ['required', 'integer', 'min:0'],
            'type' => ['required'],
            'lieu' => ['required', 'min:3', 'max:50'],
            'photo' => ['image', 'max:2000', 'required'],
            // 'disponibilite' => ['required', 'boolean'],
            // FOR SEARCH ON PRICE USE numeric as type and add gte:0
            'disponibilite' => ['required', 'min:3', 'max:3'],
        ];
    }
}
