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
            $table->string('sector')->nullable();
            $table->string('empresa')->nullable();
            $table->string('nombre_proyecto')->nullable();
            $table->integer('status_proyecto')->nullable();
            $table->string('objetivo', 500)->nullable();
            $table->string('alcance', 500)->nullable();
            $table->enum('estudio', ['Ingenieria Conceptual', ' Ingenieria Basica', 'Ingenieria de Detalle']);
            $table->decimal('monto_inicial', 10, 3)->nullable();
            $table->enum('tipo_financiamiento', ['Interno', 'Externo']);
            $table->string('nudos_criticos', 500)->nullable();
            $table->string('base', 250)->nullable()->nullable();
            $table->string('plan', 250)->nullable()->nullable();
            $table->string('recomendaciones', 500)->nullable();
            $table->string('gerente', 100)->nullable();
            $table->string('tecnologia', 80)->nullable();
            $table->string('ubi_tech', 80)->nullable();
            $table->string('cronograma', 50)->nullable();
            $table->boolean('pl_ejec_preliminar')->nullable();
            $table->enum('permisos', ['Municipal', 'Ambiental', 'Cocial', 'Laboral']);
            $table->boolean('acc_alcance')->nullable();
            $table->boolean('acc_sitio_ejecucion')->nullable();
            $table->boolean('acc_interrelaciones')->nullable();
            $table->boolean('obt_permisos')->nullable();
            $table->boolean('gestion_adquisicion_lp')->nullable();
            $table->boolean('contratacion')->nullable();
            $table->string('infraestructura', 80)->nullable();
            $table->boolean('aseguramiento_tec')->nullable();
            $table->string('diseno_basico')->nullable();
            $table->decimal('plan_ejecucion', 10, 2)->nullable();
            $table->string('procura', 100)->nullable();
            $table->string('construccion', 100)->nullable();
            $table->decimal('avance_financiero', 10, 2)->nullable();
            $table->decimal('avance_doc', 10, 2)->nullable();
            $table->decimal('equipos_vacio', 10, 2)->nullable();
            $table->decimal('pruebas_arranque', 10, 2)->nullable();
            $table->boolean('training_personal')->nullable();
            $table->boolean('pruebas_garantia')->nullable();
            $table->boolean('acep_provisional')->nullable();
            $table->string('test_accept')->nullable();
            $table->integer('manuales_op')->nullable();
            $table->integer('manuales_mant')->nullable();
            $table->decimal('planos_construidos', 10, 2)->nullable();
            $table->string('acep_final')->nullable();
            $table->boolean('cierre_contrato')->nullable();
            $table->string('transfer_actives')->nullable();
            $table->string('transfer_warrants')->nullable();
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
