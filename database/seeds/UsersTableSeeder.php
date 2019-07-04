<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Alan',
            'email' => 'alanlua2020@hotmail.com',
            'login' => '20181042060015',
            'password' => bcrypt('12345678'),
        ]);
    }
}
