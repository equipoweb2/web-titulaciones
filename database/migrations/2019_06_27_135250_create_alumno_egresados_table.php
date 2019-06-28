<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoEgresadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_egresados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_control')->unique();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->decimal('promedio');

            $table->unsignedBigInteger('id_carrera');
            $table->foreign('id_carrera')->references('id')->on('carreras');

            $table->unsignedBigInteger('id_periodo_egreso');
            $table->foreign('id_periodo_egreso')->references('id')->on('periodos');

            $table->unsignedBigInteger('id_generacion');
            $table->foreign('id_generacion')->references('id')->on('generacions');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_egresados');
    }
}
