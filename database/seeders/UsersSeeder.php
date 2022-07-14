<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create(['name'  => 'Geraldo',
                      'email' => 'geraldo.senge@yahoo.com.br',
                      'password'=> bcrypt('12345678')]);
                    
    }
}
