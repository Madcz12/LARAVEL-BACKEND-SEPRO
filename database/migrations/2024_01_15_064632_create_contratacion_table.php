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
        Schema::create('contratacion', function (Blueprint $table) {
            $table->id();
            $$table->unsignedInteger('gerente_id');
            $table->foreign('gerente_id')->references('id')->on('gerente');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->text('tipo_contrato');
            $table->decimal('salario', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratacion');
    }
};
