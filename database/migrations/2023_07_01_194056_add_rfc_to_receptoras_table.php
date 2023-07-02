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
        Schema::table('receptoras', function (Blueprint $table) {
            //Se agrega la columna de rfc a la tabla de receptoras
            $table->string('rfc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receptoras', function (Blueprint $table) {
            //Se elimina la columna en un rollback
            $table->dropColumn('rfc');
        });
    }
};
