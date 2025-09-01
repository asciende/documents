<?php

namespace Database\Seeders;

use App\Models\Workflow;
use App\Models\WorkflowOption;
use App\Models\WorkflowStep;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkflowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('client_workflow')->delete();
        WorkflowOption::truncate();
        WorkflowStep::truncate();
        Workflow::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Workflow::create([
        //     'id' => 1,
        //     'name' => 'Fotos',
        //     'description' => 'Visualizacion de fotos desde jsonplaceholder',
        //     'scope' => 'CLIENT',
        // ]);

        // Workflow::create([
        //     'id' => 2,
        //     'name' => 'Categorias',
        //     'description' => 'Visualizacion de Categorias desde dummyjson.com',
        //     'scope' => 'CLIENT',
        // ]);

        // Workflow::create([
        //     'id' => 3,
        //     'name' => 'Categorias 2',
        //     'description' => 'Visualizacion de Categorias desde dummyjson.com',
        //     'scope' => 'CLIENT',
        // ]);
        //Workflow::factory()->count(20)->create();
    }
}
