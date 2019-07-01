<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoTituladoConSinodalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_titulado_con_sinodals', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_alumno_titulado');
            $table->foreign('id_alumno_titulado')->references('id')->on('alumno_titulados');

            $table->unsignedBigInteger('id_sinodal');
            $table->foreign('id_sinodal')->references('id')->on('sinodals');

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
        Schema::dropIfExists('alumno_titulado_con_sinodals');
    }
}
