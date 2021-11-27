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
            $table->id();
            $table->string('NombreInventario')->unique();
            $table->integer('Id_Categoria');
            $table->integer('CantidadStock');
            $table->integer('Descontinuado');
            $table->integer('Id_Proveedor');
            $table->double('PrecioUnitario');
            $table->integer('StockMax');
            $table->integer('StockMin');
            $table->integer('StockActual');
            
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
