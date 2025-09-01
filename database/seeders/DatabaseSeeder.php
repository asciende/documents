<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

    $this->call([
        ClientSeeder::class,
        UserSeeder::class,
        WorkflowSeeder::class,
        ClientWorkflowSeeder::class,
        WorkflowStepSeeder::class,
        WorkflowOptionSeeder::class,
        DocumentTypeSeeder::class,
        DocumentSeeder::class
    ]);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
