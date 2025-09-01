<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClientWorkflow;
use App\Http\Requests\StoreClientWorkflowRequest;
use App\Http\Requests\UpdateClientWorkflowRequest;
use App\Http\Resources\ClientWorkflowResource;
use Illuminate\Http\JsonResponse;

class ClientWorkflowController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(ClientWorkflowResource::collection(ClientWorkflow::all()));
        ;
    }

    public function store(StoreClientWorkflowRequest $request): JsonResponse
    {
        $workflow = ClientWorkflow::create($request->validated());
        return response()->json(new ClientWorkflowResource($workflow), 201);
    }

    public function show(ClientWorkflow $clientWorkflow): JsonResponse
    {
        return response()->json(new ClientWorkflowResource($clientWorkflow));
    }

    public function update(UpdateClientWorkflowRequest $request, ClientWorkflow $clientWorkflow): JsonResponse
    {
        $clientWorkflow->update($request->validated());
        return response()->json(new ClientWorkflowResource($clientWorkflow));        
    }

    public function destroy(ClientWorkflow $clientWorkflow): JsonResponse
    {
        $clientWorkflow->delete();
        return response()->json([
            'message' => 'Relacion Cliente Workflow eliminado correctamente.'
        ]);
    }
}

