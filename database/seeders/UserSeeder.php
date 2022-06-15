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
        User::create([
            
            'name' => 'Munna',
            'username' => 'Monir Hasan',
            'email'=> 'admin@gmail.com',
            'role' => 'admin',
            'password'=> bcrypt('11111111'),

        ]);
    }
}
