<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('clients', 'name')->ignore($this->route('client'))
            ],
            'email' => ['required', 'string', 'max:150', 'email'],
            'is_active' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede tener más de 50 caracteres.',
            'name.unique' => 'Ya existe un cliente con ese nombre.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.max' => 'El correo electrónico no puede tener más de 150 caracteres.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',

            'is_active.boolean' => 'El campo "activo" debe ser verdadero o falso.',
        ];
    }
}
