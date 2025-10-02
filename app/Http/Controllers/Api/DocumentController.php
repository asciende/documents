<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Document;
// use App\Http\Requests\StoreDocumentRequest;
// use App\Http\Requests\UpdateDocumentRequest;
// use App\Http\Resources\DocumentOptionResource;
// use App\Http\Resources\DocumentResource;
// use App\Http\Resources\DocumentStepResource;
// use App\Models\Client;
use App\Models\DocumentType;
use App\Events\DocumentsUploaded;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DocumentController extends Controller
{

    public function upload(Request $request)
    {
        $dataRequested = $request->json()->all();
        $document_type_id = $dataRequested['document_type_id'];
        $rows = $dataRequested['rows'];
        $version = Carbon::now()->format('Ymd H:i');

        if($request->input('delete') == 1){
            Document::where('document_type_id', $document_type_id)->delete();
        }

        foreach ($rows as $row) {
            Document::create([
                'client_id'        => $row['client_id'] ?? null,
                'document_type_id' => $document_type_id,
                'external_id'      => $row['external_id'],
                'identifier'       => $row['identifier'], // guardamos el JSON tal cual
                'data'             => $row['data'],       // también JSON
                'version'          => $version,
            ]);
        }

        Log::info("proxima linea event");
        //event(new DocumentsUploaded("Se cargaron documentos del tipo {$document_type_id}"));
        event(new DocumentsUploaded($document_type_id, 'Se han actualizado los documentos'));
        Log::info("anterior linea event");

        return response()->json(['message' => 'Documentos guardados correctamente.'], 201);


        //$documentos = $request->all(); // Asume JSON array en el body


        // Validación simple (opcional pero recomendable)
        // foreach ($documentos as $index => $doc) {
        //     $validator = \Validator::make($doc, [
        //         'document_type_id'        => 'required|integer',
        //         'external_id'             => 'required|integer',
        //         'identifier.dua'          => 'required|integer',
        //         'identifier.contenedor'   => 'required|string',
        //         'data.nombre'             => 'required|string',
        //         'data.direccion'          => 'required|string',
        //         'data.telefono'           => 'required|string',
        //         'data.edad'               => 'required|integer',
        //     ]);

        //     if ($validator->fails()) {
        //         return response()->json([
        //             'error' => "Error en el documento índice $index",
        //             'detalles' => $validator->errors()
        //         ], 422);
        //     }
        // }

        // Guardar todos los documentos

    }

    public function getByType(Request $request, DocumentType $documentType)
    {
        $conditions = $request->input(); // estos son las condiciones que vienen desde la url

        // esta funciona correctamete
        // $query = Document::select(
        //     'id',
        //     DB::raw("JSON_UNQUOTE(json_extract(data, '$.nombre')) as nombre"),
        //     DB::raw("JSON_UNQUOTE(json_extract(data, '$.telefono')) as telefono"),
        //     DB::raw("JSON_UNQUOTE(json_extract(identifier, '$.contenedor')) as contenedor")
        // );


        $query = Document::select('id');
        $columns = array_map('trim', explode(',', $documentType->columns));
        foreach ($columns as $column) {
            $query->addSelect(
                DB::raw("JSON_UNQUOTE(JSON_EXTRACT(data, '$.$column')) as $column")
            );
        }

        $query->where("document_type_id", $documentType->id);
        // agregar el filtro del cliente



        foreach ($conditions as $key => $value) {
            // Construimos la condición para el campo JSON
            $query->where("identifier->{$key}", $value);
        }
        return response()->json($query->get());

        //return response()->json($documentType);
        //$request->input('hub_verify_token')
        //$request->input('hub_verify_token')
        // dd($documentType->columns);
        // dd($documentType->columns);
        // dd($request->input());


        // $identifier = null;
        // foreach($conditions as $key => $value)
        // {
        //     $identifier .= '"'.$key.'":"'.$value.'",';
        // }
        // $identifier = '{'.trim($identifier,',').'}';
        // $query = Document::query();
        // $query->Where('identifier',$identifier);

        // dump($identifier);
        // dump($query->toSql());
        // dump($query->getBindings());


        // $document = Document::findOrFail($id);
        // $fieldsString = $document->documentType()->columns();
        // //$fieldsString = $request->input('fields', '');  // Ej: "nombre y telefono" desde query param ?fields=nombre y telefono

        // if (empty($fieldsString)) {
        //     return response()->json($document->data);  // Devuelve todo si no se especifica
        // }
        // // Parsear el string: dividir por " y " y limpiar espacios
        // $fields = array_map('trim', explode(',', $fieldsString));

        // // Filtrar el array data solo con las claves solicitadas
        // $filteredData = array_intersect_key($document->data ?? [], array_flip($fields));

        // return response()->json($filteredData);
    }


    // public function index(): JsonResponse
    // {
    //     //$documents = Document::with('clients')->get();
    //     return response()->json(DocumentResource::collection($documents));
    // }

    // public function store(StoreDocumentRequest $request): JsonResponse
    // {
    //     $workflow = Document::create($request->validated());
    //     return response()->json(new DocumentResource($workflow), 201);
    // }

    // public function show(Document $document): JsonResponse
    // {
    //     return response()->json($document);
    // }
    public function showData(Document $document): JsonResponse
    {
        //dd($document);
        return response()->json($document->data);
    }

    // public function update(UpdateDocumentRequest $request, Document $workflow): JsonResponse
    // {
    //     $workflow->update($request->validated());
    //     return response()->json(new DocumentResource($workflow));
    // }

    // public function destroy(Document $workflow): JsonResponse
    // {
    //     $workflow->delete();
    //     return response()->json([
    //         'message' => 'Document eliminado correctamente.'
    //     ]);
    // }

    // public function options(Document $workflow): JsonResponse
    // {
    //     $workflow->load('options');
    //     return response()->json(new DocumentResource($workflow));
    // }

}
