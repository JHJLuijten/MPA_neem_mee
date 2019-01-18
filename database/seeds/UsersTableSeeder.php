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
                DB::table('users')->insert([
                    ['name'=>'John Smith','email'=>'johnsmith@gmail.com','password'=>Hash::make('password'),'remember_token'=>str_random(10)],
                    ['name'=>'John Doe','email'=>'johndoe@gmail.com','password'=>Hash::make('password'),'remember_token'=>str_random(10)],
                    ['name'=>'Jane Smith','email'=>'janesmith@gmail.com','password'=>Hash::make('password'),'remember_token'=>str_random(10)],
                    ['name'=>'Jane Doe','email'=>'janedoe@gmail.com','password'=>Hash::make('password'),'remember_token'=>str_random(10)],

                ]);
    }
}
