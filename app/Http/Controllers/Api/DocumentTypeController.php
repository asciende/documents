<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\DocumentType;
// use App\Models\DocumentType;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;


class DocumentTypeController extends Controller
{
    public function index(): JsonResponse
    {
        $documentTypes = DocumentType::get();
        return response()->json(ClientResource::collection($documentTypes));
        //return response()->json($documentTypes);
    }

    public function filters(DocumentType $documentType): JsonResponse
    {
        $filters = [
            'filters' => $documentType->filters,
            'filters_labels' => $documentType->filters_labels
        ];
        return response()->json($filters);
    }

    public function columns(DocumentType $documentType): JsonResponse
    {
        $columns = [
            'columns' => $documentType->columns,
            'columns_header' => $documentType->columns_header
        ];
        return response()->json($columns);
    }

    // public function store(StoreClientRequest $request): JsonResponse
    // {
    //     $client = Client::create($request->validated());
    //     return response()->json(new ClientResource($client), 201);
    // }

    // puede ser que el show no le pase cliente
    // public function show(?Client $client = null): JsonResponse
    // {
    //     if (!$client) {
    //         $client = request()->user(); // o auth()->user();
    //     }
    //     $client->load('workflows');
    //     return response()->json(new ClientResource($client));
    // }

    // public function show(Client $client): JsonResponse
    // {
    //     $client->load('workflows');
    //     return response()->json(new ClientResource($client));
    // }

    // public function update(UpdateClientRequest $request, Client $client): JsonResponse
    // {
    //     $client->update($request->validated());
    //     return response()->json(new ClientResource($client));
    // }

    // public function destroy(Client $client): JsonResponse
    // {
    //     $client->delete();
    //     return response()->json([
    //         'message' => 'Cliente eliminado correctamente.'
    //     ]);
    // }

    // public function workflows(): JsonResponse
    // {
    //     $client = request()->user(); // o auth()->user();
    //     $client->load('workflows');
    //     return response()->json(new ClientResource($client));
    // }



}
