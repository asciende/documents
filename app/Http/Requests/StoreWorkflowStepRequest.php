<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkflowStepRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'workflow_id' => 'required|exists:workflows,id',
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:150',
            'step' => 'required|integer|min:0',
            'action' => 'required|string|in:api,query',
            'verb' => 'required|string|in:GET,POST',
            'target' => 'required|string|max:150',
            'is_active' => 'sometimes|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'workflow_id.required' => 'El workflow es obligatorio.',
            'workflow_id.exists' => 'El workflow seleccionado no existe.',

            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser un texto.',
            'name.max' => 'El nombre no debe superar los 50 caracteres.',

            'description.required' => 'La descripción es obligatoria.',
            'description.string' => 'La descripción debe ser un texto.',
            'description.max' => 'La descripción no debe superar los 150 caracteres.',

            'step.required' => 'El paso (step) es obligatorio.',
            'step.integer' => 'El paso debe ser un número entero.',
            'step.min' => 'El paso no puede ser menor a 0.',

            'action.required' => 'La acción es obligatoria.',
            'action.in' => 'La acción debe ser "api" o "query".',

            'verb.required' => 'El verbo es obligatorio.',
            'verb.in' => 'El verbo debe ser "GET" o "POST".',

            'target.required' => 'El destino (target) es obligatorio.',
            'target.string' => 'El destino debe ser un texto.',
            'target.max' => 'El destino no debe superar los 150 caracteres.',

            'is_active.boolean' => 'El campo "activo" debe ser verdadero o falso.',
        ];
    }

}
