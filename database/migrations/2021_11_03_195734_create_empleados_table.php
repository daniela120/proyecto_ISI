<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Apellido');
            $table->date('FechaNacimiento');
            $table->date('FechaContratacion');
            $table->string('Direccion');
            $table->integer('Id_Cargo');
            $table->string('Telefono');
            $table->integer('Id_Usuario');
            $table->integer('Id_Documento');
            $table->integer('Id_Turno');
            $table->string('Documento');
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
        Schema::dropIfExists('empleados');
    }
}
