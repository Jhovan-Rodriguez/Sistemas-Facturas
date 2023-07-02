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
        Schema::create('emisoras', function (Blueprint $table) {
            //Se crean los campos de la tabla de las empresas emisoras
            $table->id();
            $table->string('nombre');
            $table->string('razon_social');
            $table->string('correo_contacto');
            $table->string('rfc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emisoras');
    }
};
