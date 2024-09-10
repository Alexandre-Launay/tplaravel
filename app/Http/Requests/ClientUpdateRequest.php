<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
            'civilite_id' => 'required',
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'email' => 'required',
            'tel' => 'string|max:20'
        ];
    }
}
