<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoTituladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_titulados', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_alumno_egresado')->unique();
            $table->foreign('id_alumno_egresado')->references('id')->on('alumno_egresados');

            $table->unsignedBigInteger('id_opcion_titulacion');
            $table->foreign('id_opcion_titulacion')->references('id')->on('opcion_titulacions');

            $table->integer('edad');
            $table->date('fecha_titulacion');
            $table->time('hora_titulacion')->nullable();

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
        Schema::dropIfExists('alumno_titulados');
    }
}
