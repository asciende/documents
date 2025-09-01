<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkflowOptionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'workflow_id' => $this->workflow_id,
            'name' => $this->name,
            'description' => $this->description,
            'order' => $this->order,
            'action' => $this->action,
            'verb' => $this->verb,
            'target' => $this->target,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
