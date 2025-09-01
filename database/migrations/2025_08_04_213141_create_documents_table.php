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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable()->constrained()->onDelete('restrict');
            $table->foreignId('document_type_id')->constrained()->onDelete('restrict');
            $table->unsignedInteger('external_id')->comment('identificador que le asigna rama a los documentos');
            $table->json('identifier', 100)->comment('identificador, json que indica campo valor para realizar la busqueda');
            $table->json('data', 1000)->comment('contenido a devolver, seguramente es un json');
            $table->timestamps();
        });
    }

    // identifier
    // este campo me servira para realizar busquedas, en el caso que el query de la url sea /?dua=001122&contenedor=987
    // me traerá todos los registros que cumplan con ese filtro

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
