<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Http\Resources\DocumentTypeResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(): JsonResponse
    {
        $clients = Client::with('workflows')->get();
        return response()->json(ClientResource::collection($clients));
    }

    public function store(StoreClientRequest $request): JsonResponse
    {
        $client = Client::create($request->validated());
        return response()->json(new ClientResource($client), 201);
    }

    // puede ser que el show no le pase cliente
    // public function show(?Client $client = null): JsonResponse
    // {
    //     if (!$client) {
    //         $client = request()->user(); // o auth()->user();
    //     }
    //     $client->load('workflows');
    //     return response()->json(new ClientResource($client));
    // }

    public function show(Client $client): JsonResponse
    {
        $client->load('workflows');
        return response()->json(new ClientResource($client));
    }

    public function update(UpdateClientRequest $request, Client $client): JsonResponse
    {
        $client->update($request->validated());
        return response()->json(new ClientResource($client));
    }

    public function destroy(Client $client): JsonResponse
    {
        $client->delete();
        return response()->json([
            'message' => 'Cliente eliminado correctamente.'
        ]);
    }

    public function workflows(): JsonResponse
    {
        $client = request()->user(); // o auth()->user();
        $client->load('workflows');
        return response()->json(new ClientResource($client));
    }

    public function documentTypes(): JsonResponse
    {
        $client = Auth::user(); // cliente autenticado
        $documentTypes = $client->documentTypes; // relación many-to-many
        // $documentTypes = $client->documentTypes()->select(
        //                                     'document_types.id',
        //                                     'document_types.name',
        //                                     'document_types.columns',
        //                                     'document_types.titles',
        //                                     'document_types.filter')->get();
        return response()->json(DocumentTypeResource::collection($documentTypes));
        //return response()->json($documentTypes);
    }


}
