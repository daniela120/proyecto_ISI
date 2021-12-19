<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('num_factura');
            $table->datetime('fecha_factura');
            $table->string('direccion');
            $table->bigInteger('pedido_id')->unsigned();
            $table->bigInteger('parametrizacion_id')->unsigned();


            
            $table->timestamps();

            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete("cascade");
            $table->foreign('parametrizacion_id')->references('id_parametro')->on('parametrizacion_facturas')->onDelete("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
