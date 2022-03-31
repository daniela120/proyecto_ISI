<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Admin',
            'User',
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }
        
        
        //$role2 = Role::create(['name' => 'Cocinero']);

/*         Permission::create(['name' => 'home'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'estadoenvios.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'estadoenvios.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'estadoenvios.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'estadoenvios.delete'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'categorias.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'categorias.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'categorias.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'categorias.delete'])->syncRoles([$role1, $role2]); */
    }

}
