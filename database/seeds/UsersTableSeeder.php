<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'Onyekachi Stanley',
            'email' => 'onyekachila@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
