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
        if (User::count() == 0) {
            User::create([
                'name'           => 'admin',
                'email'          => 'admin@booking.com',
                'password'       => bcrypt('password'),
                'remember_token' => str_random(60),
            ]);

            User::create([
                'name'           => 'user',
                'email'          => 'user@booking.com',
                'password'       => bcrypt('password'),
                'remember_token' => str_random(60),
            ]);
        }
    }
}
