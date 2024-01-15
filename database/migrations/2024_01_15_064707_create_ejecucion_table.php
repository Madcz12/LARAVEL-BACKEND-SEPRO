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
        Schema::create('ejecucion', function (Blueprint $table) {
            $table->id();
            $table->text('procura');
            $table->text('construccion');
            $table->decimal('porc_manuales');
            $table->decimal('pac');
            $table->decimal('equipos_vacio');
            $table->decimal('pruebas_arranque');
            $table->boolean('training_personal');
            $table->text('garantia');
            $table->text('acep_provisional');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejecucion');
    }
};
