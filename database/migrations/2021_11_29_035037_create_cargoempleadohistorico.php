<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoempleadohistorico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargoempleadohistoricos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_empleado');
            $table->integer('id_cargo');
            $table->date('FechaInicio');
            $table->date('FechaFinal');
            
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
        Schema::dropIfExists('cargoempleadohistorico');
    }
}
