<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item')->insert([
            ['name' => 'steen','weightInGrams' => 200],
            ['name' => 'zonnebril','weightInGrams' => 20],
            ['name' => 'broek','weightInGrams' => 500],
            ['name' => 'gewichten','weightInGrams' => 1500],
            ['name' => 'laptop','weightInGrams' => 2500],


        ]);
    }
}
