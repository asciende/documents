<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ClientWorkflow;
use App\Models\Workflow;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientWorkflowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('client_workflow')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $now = now();
        $clientIds = Client::pluck('id')->toArray();
        $workflowIds = Workflow::whereIn('scope', ['CLIENT','ALL'])->pluck('id')->toArray();

        // foreach ($clientIds as $clientId) {
        //     foreach ($workflowIds as $workflowId) {
        //     //    $randomWorkflowIds = collect($workflowIds)->random(1,count($workflowIds)); //segun la cantidad de registros
        //   //      Client::find($clientId)->workflows()->attach($randomWorkflowIds);
        //         $attachData[$workflowId] = [
        //             'created_at' => $now,
        //             'updated_at' => $now,
        //         ];
        //         Client::find($clientId)->workflows()->syncWithoutDetaching($attachData);
        //     }
        // }

        // foreach ($clientIds as $clientId) {
        //     $randomWorkflowIds = collect($workflowIds)->random(1,count($workflowIds)); //segun la cantidad de registros
        //     Client::find($clientId)->workflows()->attach($randomWorkflowIds);
        // }
    }
}
