<?php

namespace Database\Seeders;

use App\Models\Workflow;
use App\Models\WorkflowOption;
use App\Models\WorkflowStep;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkflowOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        WorkflowOption::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // $workflowIds = Workflow::pluck('id')->toArray();

        // foreach ($workflowIds as $workflowId) {
        //     $workflow = Workflow::find($workflowId);
        //     $workflow->options()->createMany([
        //         [
        //             'name' => 'Opcion 1',
        //             'description' => 'Verifica que los datos del cliente sean correctos',
        //             'order' => 1,
        //             'action' => 'validar',
        //             'verb' => 'POST',
        //             'target' => 'https://dummyjson.com/products/categories',
        //             'is_active' => true,
        //         ],
        //         [
        //             'name' => 'Opcion  2',
        //             'description' => 'Crea el cliente en la base de datos',
        //             'order' => 2,
        //             'action' => 'crear',
        //             'verb' => 'POST',
        //             'target' => 'https://dummyjson.com/docs/products',
        //             'is_active' => true,
        //         ],
        //         [
        //             'name' => 'Opcion 3',
        //             'description' => 'Confirma la creación al usuario final',
        //             'order' => 3,
        //             'action' => 'notificar',
        //             'verb' => 'GET',
        //             'target' => '/clientes/confirmacion',
        //             'is_active' => true,
        //         ],
        //     ]);
        // }
    }
}
