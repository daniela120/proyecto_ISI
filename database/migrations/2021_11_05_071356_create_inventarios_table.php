<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id('id_inventario');
            $table->string('NombreInventario');
            $table->string('Id_Categoria');
            $table->string('CanidadStock');
            $table->string('Descontinuado');
            $table->string('Id_Proveedor');
            $table->string('StockMax');
            $table->string('StockMin');
            $table->string('StockActual');
            
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
        Schema::dropIfExists('inventarios');
    }
}
