<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Esta es la tabla de relacion entre el cliente y los workflows que se le permiten el acceso
     */
    public function up(): void
    {
        Schema::create('client_workflow', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('restrict');
            $table->foreignId('workflow_id')->constrained()->onDelete('restrict');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_workflow');
    }
};