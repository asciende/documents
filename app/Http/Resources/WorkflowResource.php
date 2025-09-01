<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkflowResource extends JsonResource
{
    public function toArray(Request $request): array
    {

        // $data = [
        //     'id'          => $this->id,
        //     'name'        => $this->name,
        //     'description' => $this->description,
        //     //'clients'     => ClientResource::collection($this->whenLoaded('clients')),
        // ];

        // if ($request->user()?->is_admin) {
        //     $data += [
        //         'scope'      => $this->scope,
        //         'is_active'  => $this->is_active,
        //         'created_at'  => $this->created_at?->toDateTimeString(),
        //         'updated_at' => $this->updated_at?->toDateTimeString(),
        //     ];
        // }

        // return $data;

        return [
            'id' => $this->id,
            'name' => $this->name,
            //'user' => $request->user(),
            'description' => $this->description,
            'scope' => $this->scope,
           // 'is_active' => $this->is_active,
            'clients' => ClientResource::collection($this->whenLoaded('clients')),
            'created_at' => $this->created_at?->toDateTimeString(),
            'updated_at' => $this->updated_at?->toDateTimeString(),
            'options' => WorkflowOptionResource::collection($this->whenLoaded('options')),
        ];
    }
}
