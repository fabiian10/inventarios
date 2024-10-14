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
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->text('nombre_departamento');
            $table->text('nombre_titular');
            $table->text('tratamiento_titular');
            $table->text('cargo_titular');
            $table->text('prefijo');
            $table->text('carpeta');
            $table->text('ur_perteneciente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departamentos');
    }
};
