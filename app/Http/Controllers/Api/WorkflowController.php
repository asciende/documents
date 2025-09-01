<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Workflow;
use App\Http\Requests\StoreWorkflowRequest;
use App\Http\Requests\UpdateWorkflowRequest;
use App\Http\Resources\WorkflowOptionResource;
use App\Http\Resources\WorkflowResource;
use App\Http\Resources\WorkflowStepResource;
use App\Models\Client;
use Illuminate\Http\JsonResponse;

class WorkflowController extends Controller
{
    public function index(): JsonResponse
    {
        $workflows = Workflow::with('clients')->get();    
        return response()->json(WorkflowResource::collection($workflows));
    }

    public function store(StoreWorkflowRequest $request): JsonResponse
    {
        $workflow = Workflow::create($request->validated());
        return response()->json(new WorkflowResource($workflow), 201);
    }

    public function show(Workflow $workflow): JsonResponse
    {
        $workflow->load('clients');
        return response()->json(new WorkflowResource($workflow));
    }

    public function update(UpdateWorkflowRequest $request, Workflow $workflow): JsonResponse
    {
        $workflow->update($request->validated());
        return response()->json(new WorkflowResource($workflow));
    }

    public function destroy(Workflow $workflow): JsonResponse
    {
        $workflow->delete();
        return response()->json([
            'message' => 'Workflow eliminado correctamente.'
        ]);
    }

    public function options(Workflow $workflow): JsonResponse
    {
        $workflow->load('options');
        return response()->json(new WorkflowResource($workflow)); 
    }

}
