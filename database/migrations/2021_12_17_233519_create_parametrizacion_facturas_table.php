<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametrizacionFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametrizacion_facturas', function (Blueprint $table) {

            $table->engine="InnoDB";
            $table->id('id_parametro');
            $table->string('descripcion');
            $table->integer('rtn');
            $table->date('fechavencimiento');
            $table->string('CAI');
            $table->integer('rangoinicial');
            $table->integer('rangofinal');
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
        Schema::dropIfExists('parametrizacion_facturas');
    }
}
