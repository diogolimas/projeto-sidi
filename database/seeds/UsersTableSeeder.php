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
            'papel_id'  => '3',
            'name'      => 'Alan',
            'email'     => 'alanlua2020@hotmail.com',
            'password'  => bcrypt('12345678'),
        ]);
        User::create([
            'papel_id'  => '3',
            'name'      => 'Diogo Lima',
            'email'     => 'diogo.libras43@gmail.com',
            'password'  => bcrypt('12345678'),
        ]);
        User::create([
            'papel_id'  => '3',
            'name'      => 'José Mateus',
            'email'     => 'josemateusp08cs@gmail.com',
            'password'  => bcrypt('12345678'),
        ]);
    }
}
