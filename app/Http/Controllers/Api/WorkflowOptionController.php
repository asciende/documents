<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkflowOption;
use App\Http\Requests\StoreWorkflowOptionRequest;
use App\Http\Requests\UpdateWorkflowOptionRequest;
use App\Http\Resources\WorkflowOptionResource;
use Illuminate\Http\JsonResponse;

class WorkflowOptionController extends Controller
{
    public function index(): JsonResponse
    {
        $options = WorkflowOption::all();
        return response()->json(WorkflowOptionResource::collection($options),200);
    }

    public function store(StoreWorkflowOptionRequest $request): JsonResponse
    {
        $option = WorkflowOption::create($request->validated());
        return response()->json(new WorkflowOptionResource($option),201);
    }

    public function show(WorkflowOption $workflowOption): JsonResponse
    {
        return response()->json(new WorkflowOptionResource($workflowOption),200);
    }

    public function update(UpdateWorkflowOptionRequest $request, WorkflowOption $workflowOption): JsonResponse
    {
        $workflowOption->update($request->validated());
        return response()->json(new WorkflowOptionResource($workflowOption),200);
    }

    public function destroy(WorkflowOption $workflowOption): JsonResponse
    {
        $workflowOption->delete();
        return response()->json(null, 204);
    }
}
