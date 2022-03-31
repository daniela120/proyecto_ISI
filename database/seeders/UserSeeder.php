<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gg.com',
            'password' => bcrypt('Hola1234')
        ])->assignRole('Admin');

        $user->assignRole('Admin');
        User::factory(4)->create();
    }
}
