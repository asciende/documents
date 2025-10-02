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
        Schema::table('document_types', function (Blueprint $table) {
            // Aquí haces los cambios, por ejemplo:
            $table->string('columns_headers')->after('columns')->comment('cabezales para la tabla');
            $table->string('filters')->after('columns_headers');
            $table->string('filters_labels')->after('filters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('document_types', function (Blueprint $table) {
            $table->dropColumn('columns_headers');
            $table->dropColumn('filters');
            $table->dropColumn('filters_labels');
        });
    }

};
