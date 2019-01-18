<?php

use Illuminate\Database\Seeder;

class categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            ['name' =>'stenen'],
            ['name' =>'kleding'],
            ['name' =>'games'],
            ['name' => 'zwemspullen'],
        ]);
    }
}
