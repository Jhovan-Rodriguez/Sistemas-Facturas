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
        Schema::table('facturas', function (Blueprint $table) {
            //Se añaden los campos faltantes a la tabla facturas
            $table->foreignId('emisora_id')->constrained()->onDelete('cascade');
            $table->foreignId('receptora_id')->constrained()->onDelete('cascade');
            $table->string('folio');
            $table->string('pdf');
            $table->string('xml');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('facturas', function (Blueprint $table) {
            //Se eliminan columnas para un rollback
            $table->dropColumn('emisora_id');
            $table->dropColumn('receptora_id');
            $table->dropColumn('folio');
            $table->dropColumn('pdf');
            $table->dropColumn('xml');
        });
    }
};
