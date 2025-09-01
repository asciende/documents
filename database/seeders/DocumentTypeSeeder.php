<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\DocumentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DocumentType::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DocumentType::create([
            'name'=>'Fichas de Operación de Exportación',
            'columns'=>'dua, contenedor, precinto',
        ]);
        // DocumentType::create([
        //     'name'=>'Tipo 2 NT',
        //     'columns'=>'nombre, telefono',
        // ]);
        // DocumentType::create([
        //     'name'=>'Tipo 3 NE',
        //     'columns'=>'nombre, edad',
        // ]);

        // 

        //Client::factory()->count(30)->create();
    }
}
