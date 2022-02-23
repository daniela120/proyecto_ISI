<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;

class CategoriasTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_IndexCategoria()
    {
        $Categorias=array(
            $Categoria=array('Bebidas heladas','Bebidas Calientes',"postre"),
            $Descripcion=array('Bebidas que son heladas','Bebidas que son calientes',"Postres dulces")
        );
        $datos=$Categorias;
        $name=$Categoria;

        $this->assertContains($name,$Categorias,"testArray doesn't contains value as value");
    }
    
    public function test_StoreCategoria()
    {
        $Categorias=array(
            $Categoria=array('Bebidas heladas','Bebidas Calientes'),
            $Descripcion=array('Bebidas que son heladas','Bebidas que son calientes')
        );
        array_push($Categoria, "Postres");
        array_push($Descripcion, "Postres dulces");

        $name="Postres";

        $this->assertContains($name,$Categoria,"testArray doesn't contains value as value");
    }

   public function test_UpdateCategoria()
    {
        $Categorias=array(
            $Categoria=array(['Bebidas heladas'=>['Bebidas Calientes'=>['Postres']]])
        );
        Arr::set($Categoria,'Bebidas heladas','Bebidas que son heladas');
        $name="Bebidas que son heladas";

        $this->assertContains($name,$Categoria,"testArray doesn't contains value as value");
    }

    public function test_DeleteCategoria()
    {
         $Categoria=array(
             $info=[ 'Categoria'=>'Bebidas heladas', 'Descripcion'=>'Bebidas que son heladas'],
         ); 
 
         Arr::pull($info, 'Categoria');
         Arr::pull($info, 'Descripcion');

         $this->assertEmpty($info,"Array is not empty");
    }

}
