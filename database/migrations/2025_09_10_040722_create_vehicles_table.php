<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            // Datos del vehículo
            $table->string('placa', 10)->unique();
            $table->string('marca', 50);
            $table->string('modelo', 50);
            $table->year('año_fabricacion');

            // Datos del cliente
            $table->string('nombre_cliente', 100);
            $table->string('apellidos_cliente', 100);
            $table->string('documento_cliente', 20)->unique();
            $table->string('correo_cliente', 150)->unique();
            $table->string('telefono_cliente', 20);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
