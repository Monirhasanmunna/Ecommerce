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
            
            'first_name' => 'Monir',
            'last_name' => 'Hasan',
            'user_name' => 'Monir Hasan',
            'email'=> 'admin@gmail.com',
            'role' => 'admin',
            'password'=> bcrypt('11111111'),

        ]);
    }
}
