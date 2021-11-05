<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('Id_Empleado');
            $table->date('Fecha');
            $table->string('Hora_pedido');
            $table->string('Hora_Entrega');
            $table->string('Id_Estado_Pedido');
            $table->string('Id_Tipo_dde_Pago');
            $table->string('Id_cliente');
            $table->string('Id_Estado_Envio');
            $table->string('Pedido_EnLinea');
            
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
        Schema::dropIfExists('pedidos');
    }
}
