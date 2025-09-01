<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Document;
use App\Models\DocumentType;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        // Opcional: limpiar la tabla
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Document::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Crear DocumentTypes si no existen
        // if (DocumentType::count() === 0) {
        //     $types = ['Contrato', 'Factura', 'Informe'];
        //     foreach ($types as $type) {
        //         DocumentType::create(['name' => $type]);
        //     }
        // }

        // $documentTypes = DocumentType::all();
        // //dump();
        // //dd($documentTypes);

        // // Por cada tipo de documento, crear 3 documentos (uno por cada client_id del 1 al 3)
        // foreach ($documentTypes as $documentType) {
        //     Document::factory()
        //         ->count(100)
        //         ->state([
        //             'document_type_id' => $documentType->id,
        //         ])
        //         ->afterMaking(function ($document) {
        //             dump($document->document_type_id); // Aquí ya está disponible
        //         })
        //         ->create([
                    
        //         ]);
        // }
    }
}


// namespace Database\Seeders;

// use App\Models\Document;
// use App\Models\DocumentType;
// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Faker\Factory as Faker;

// class DocumentSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {

//         DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//         DB::table('documents')->delete();
//         DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
//         $faker = Faker::create();

//         // Obtener todos los DocumentTypes
//         $documentTypes = DocumentType::all();

//         // Si no hay DocumentTypes, crear algunos de ejemplo
//         if ($documentTypes->isEmpty()) {
//             $types = ['Contrato', 'Factura', 'Informe'];
//             foreach ($types as $type) {
//                 DocumentType::create(['name' => $type]);
//             }
//             $documentTypes = DocumentType::all();
//         }

//         // Crear 3 Documents por cada DocumentType
//         foreach ($documentTypes as $documentType) {
//             for ($clientId = 1; $clientId <= 3; $clientId++) {
//                 Document::create([
//                     'document_type_id' => $documentType->id,
//                     'client_id' => $clientId,
//                     'external_id' => $faker->numberBetween(2000000, 4000000),
//                     'identifier' => json_encode([
//                         'dua' => $faker->numberBetween(10000000, 99999999), // Número de 8 dígitos
//                         'contenedor' => 'DD' . $faker->unique()->numerify('#########'), // Ej: DD987654321
//                     ], JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR),

//                     'data' => json_encode([
//                         'nombre' => $faker->name,
//                         'direccion' => $faker->address,
//                         'telefono' => $faker->phoneNumber,
//                         'edad' => $faker->numberBetween(18, 80),
//                     ], JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR),
//                 ]);
//             }
//         }
//     }
// }
