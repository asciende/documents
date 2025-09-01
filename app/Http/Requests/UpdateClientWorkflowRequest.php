<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientWorkflowRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id' => 'sometimes|exists:clients,id',
            'workflow_id' => 'sometimes|exists:workflows,id',
            'is_active' => 'sometimes|boolean',
        ];
    }
}

