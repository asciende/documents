<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WorkflowStep;
use App\Http\Requests\StoreWorkflowStepRequest;
use App\Http\Requests\UpdateWorkflowStepRequest;
use App\Http\Resources\WorkflowStepResource;
use Illuminate\Http\JsonResponse;

class WorkflowStepController extends Controller
{
    public function index(): JsonResponse
    {
        $steps = WorkflowStep::all();
        return response()->json(WorkflowStepResource::collection($steps),200);
    }

    public function store(StoreWorkflowStepRequest $request): JsonResponse
    {
        $step = WorkflowStep::create($request->validated());
        return response()->json(new WorkflowStepResource($step),201);
    }

    public function show(WorkflowStep $workflowStep): JsonResponse
    {
        return response()->json(new WorkflowStepResource($workflowStep),200);
    }

    public function update(UpdateWorkflowStepRequest $request, WorkflowStep $workflowStep): JsonResponse
    {
        $workflowStep->update($request->validated());
        return response()->json(new WorkflowStepResource($workflowStep),200);
    }

    public function destroy(WorkflowStep $workflowStep): JsonResponse
    {
        $workflowStep->delete();
        return response()->json(null, 204);
    }
}
