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
        Schema::create('client_audits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('restrict')->nullable()->comment('puede ser nullable porque hay usuarios externos y tambien el login no tiene id');
            $table->string('action', 150)->comment('indica que se esta haciendo, por ejemplo login, logout, profile, get workflow, get steps');
            $table->string('target', 150)->comment('destino de la peticion');
            $table->string('request', 150)->comment('valores ingresados por el usuario');
            $table->string('response', 1000)->comment('valores devueltos desde la peticion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_audits');
    }
};
