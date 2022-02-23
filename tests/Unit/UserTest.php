<?php

namespace Tests\Unit;


use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_User_Index()
    {
        $Users = array(
            $email = array('miguel@gg.com', 'eduar@gg.com'),
            $Nombre = array('Miguel', 'Eduar')
        );
        $datos=$Users;
        $name=$email;

        $this->assertContains($name, $Users, "testArray doesn't contains value as value");
    
    }
   
    
    public function test_UsersUpdate()
    {
        $Users=array(
            $Users=array(['user' => ['migul@gg.com' =>['Nombre' => 'Miguel']]])
        );
        Arr::set($Users, 'user', "miguel@gg.com");
        $name ="miguel@gg.com";

        $this->assertContains($name, $Users,"testArray doesn't contains value as value");
    }
}
