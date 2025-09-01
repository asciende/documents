<?php

namespace Database\Seeders;

use App\Models\Workflow;
use App\Models\WorkflowStep;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkflowStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        WorkflowStep::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // $workflowIds = Workflow::pluck('id')->toArray();

        // foreach ($workflowIds as $workflowId) {
        //     $workflow = Workflow::find($workflowId);
        //     $workflow->steps()->createMany([
        //         [
        //             'name' => 'Validación de Datos',
        //             'description' => 'Verifica que los datos del cliente sean correctos',
        //             'order' => 1,
        //             'action' => 'validar',
        //             'verb' => 'POST',
        //             'target' => '/clientes/validar',
        //             'is_active' => true,
        //         ],
        //         [
        //             'name' => 'Creación de Cliente',
        //             'description' => 'Crea el cliente en la base de datos',
        //             'order' => 2,
        //             'action' => 'crear',
        //             'verb' => 'POST',
        //             'target' => '/clientes/crear',
        //             'is_active' => true,
        //         ],
        //         [
        //             'name' => 'Confirmación',
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
