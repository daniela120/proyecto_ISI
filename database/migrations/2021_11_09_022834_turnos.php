<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class turnos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->string('TipoTurno');
            $table->string('Descripcion');
            $table->string('HoraEntrada');
            $table->string('HoraSalida');
            
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
        Schema::dropIfExists('turnos');
    }
}

