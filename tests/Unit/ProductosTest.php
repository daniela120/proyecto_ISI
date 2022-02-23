<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;

class ProductosTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_IndexProductos()
    {
        $Productos=array(
            $NombreProducto=array('Granita de mora','Late',"postre"),
            $Descripcion=array('Bebida de mora helada','Bebida caliente'),
            $id_Categoria=array('1','2'),
            $Precio=array('55','65')
        );
        $datos=$Productos;
        $name=$NombreProducto;

        $this->assertContains($name,$Productos,"testArray doesn't contains value as value");
    }

    
    public function test_StoreProductos()
    {
        $Productos=array(
            $NombreProducto=array('Granita de mora','Late'),
            $Descripcion=array('Bebida de mora helada','Bebida caliente'),
            $id_Categoria=array('1','2'),
            $Precio=array('55','65')
        );
        array_push($NombreProducto, "Granita de cafe");
        array_push($Descripcion, "Bebida de cafe helada");
        array_push($id_Categoria, "2");
        array_push($Precio, "56");

        $name="Granita de cafe";

        $this->assertContains($name,$NombreProducto,"testArray doesn't contains value as value");
    }
    
    
   public function test_UpdateProductos()
   {
       $Productos=array(
           $NombreProducto=array(['Granita de mora'=>['Late'=>['Chocolate']]])
       );
       Arr::set($NombreProducto,'Granita de mora','Granita de mango');
       $name="Granita de mango";

       $this->assertContains($name,$NombreProducto,"testArray doesn't contains value as value");
   }

   
   public function test_DeleteProductos()
   {
        $Productos=array(
            $info=['NombreProducto'=>'Chocolate', 'Descripcion'=>'Bebida Chocolate', 'id_Categoria'=>'2', 'Precio'=>'77'],
        ); 

        Arr::pull($info, 'NombreProducto');
        Arr::pull($info, 'Descripcion');
        Arr::pull($info, 'id_Categoria');
        Arr::pull($info, 'Precio');

        $this->assertEmpty($info,"Array is not empty");
   }

}
