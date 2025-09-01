<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkflowOptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'workflow_id' => 'sometimes|exists:workflows,id',
            'name' => 'sometimes|string|max:50',
            'description' => 'sometimes|string|max:150',
            'order' => 'sometimes|integer|min:0',
            'action' => 'sometimes|string|in:api,query',
            'verb' => 'sometimes|string|in:GET,POST',
            'target' => 'sometimes|string|max:150',
            'is_active' => 'sometimes|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'workflow_id.exists' => 'El workflow seleccionado no existe.',

            'name.string' => 'El nombre debe ser un texto.',
            'name.max' => 'El nombre no debe superar los 50 caracteres.',

            'description.string' => 'La descripción debe ser un texto.',
            'description.max' => 'La descripción no debe superar los 150 caracteres.',

            'order.integer' => 'El paso debe ser un número entero.',
            'order.min' => 'El paso no puede ser menor a 0.',

            'action.in' => 'La acción debe ser "api" o "query".',

            'verb.in' => 'El verbo debe ser "GET" o "POST".',

            'target.string' => 'El destino debe ser un texto.',
            'target.max' => 'El destino no debe superar los 150 caracteres.',

            'is_active.boolean' => 'El campo "activo" debe ser verdadero o falso.',
        ];
    }

}
