<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customers')->insert([
            'clientType' => "VIP",
            'points' => 100,
            'people_id' => 1
        ]);
    }
}
