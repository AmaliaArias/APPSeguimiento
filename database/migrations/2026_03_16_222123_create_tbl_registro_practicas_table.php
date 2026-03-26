<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_registro_practicas', function (Blueprint $table) {
            $table->id();
            // Relación con el aprendiz
            $table->unsignedBigInteger('tbl_aprendiz_NIS');

            // Datos de la Práctica
            $table->string('modalidad');
            $table->string('empresa');
            $table->string('nit_empresa');
            $table->string('area_dependencia');
            $table->string('cargo_aprendiz');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            // Datos del Jefe (Ente Coformador)
            $table->string('nombre_jefe');
            $table->string('cargo_jefe');
            $table->string('email_jefe');
            $table->string('telefono_jefe');
            $table->text('funciones_relevantes')->nullable();

            $table->timestamps();

            // Llave foránea
            $table->foreign('tbl_aprendiz_NIS')->references('NIS')->on('tbl_aprendiz');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_registro_practicas');
    }
};
