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
                // $this->call(UsersTableSeeder::class);
                User::create([
                    'name'=>'John Smith',
                    'email'=>'johnsmith@gmail.com',
                    'password'=>Hash::make('password'),
                    'remember_token'=>str_random(10),
                ]);
    }
}
