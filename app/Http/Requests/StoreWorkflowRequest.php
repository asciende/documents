<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreWorkflowRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50', 'unique:workflows,name'],
            'description' => ['required', 'string', 'max:150'],
            'scope' => ['required', 'string', Rule::in(['CLIENT', 'EXTERNAL', 'ALL'])],
            'is_active' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede tener más de 50 caracteres.',
            'name.unique' => 'Ya existe un registro con ese nombre.',

            'description.required' => 'La descripción es obligatoria.',
            'description.string' => 'La descripción debe ser una cadena de texto.',
            'description.max' => 'La descripción no puede tener más de 150 caracteres.',

            'scope.required' => 'El alcance (scope) es obligatorio.',
            'scope.string' => 'El alcance debe ser una cadena de texto.',
            'scope.in' => 'El alcance debe ser uno de los siguientes valores: CLIENT, EXTERNAL o ALL.',

            'is_active.boolean' => 'El campo "activo" debe ser verdadero o falso.',
        ];
    }
}
