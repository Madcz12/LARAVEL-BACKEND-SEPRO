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
        Schema::create('analisis_opciones', function (Blueprint $table) {
            $table->id();
            $table->text('alcance');
            $table->text('acc_ubicacion');
            $table->text('acc_interrelaciones');
            $table->boolean('obt_permiso');
            $table->text('aseguramiento_tec');
            $table->text('descrip_db');
            $table->string('plan_ejecucion', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analisis_opciones');
    }
};
