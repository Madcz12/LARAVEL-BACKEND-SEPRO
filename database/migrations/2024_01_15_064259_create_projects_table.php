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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_proyecto')->nullable();
            $table->string('sector')->nullable();
            $table->string('empresa')->nullable();
            $table->string('objetivo')->nullable();
            $table->string('alcance')->nullable();
            $table->integer('monto');
            $table->enum('financiamiento', ['propio', 'externo']);
            $table->string('nudos_criticos', 255);
            $table->dateTime('cronograma');
            $table->integer('gestiones_adquisicion');
            $table->string('base');
            $table->string('plan');
            $table->text('recomendaciones', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
