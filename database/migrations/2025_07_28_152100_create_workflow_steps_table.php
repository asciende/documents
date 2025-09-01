<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workflow_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workflow_id')->constrained()->onDelete('restrict');
            $table->string('name', 50);
            $table->string('description', 150);
            $table->tinyInteger('order');
            $table->string('action', 50)->comment('api: consultas externas, query: consultas internas');
            $table->string('verb', 10)->comment('indico si es GET o POST');
            $table->string('target', 150)->comment('indica a donde debo ir, en caso de una api indicaria la url');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // defino la clave primaria compuesta por dos campos
            $table->unique(['workflow_id', 'name']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflow_steps');
    }
};
