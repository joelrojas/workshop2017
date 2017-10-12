<?php

use Illuminate\Database\Seeder;

class SellSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       // DB::table('details')->truncate();
       // DB::table('sells')->truncate();

        DB::table('sells')->insert([
            'total' => 500000,
            'date' => "08-08-16",
            'quantitySell' => 35,
            'reservations_id' =>1
        ]);

        DB::table('sells')->insert([
            'total' => 575000,
            'date' => "13-08-16",
            'quantitySell' => 63,
            'reservations_id' =>1
        ]);
        DB::table('sells')->insert([
            'total' => 560000,
            'date' => "21-10-16",
            'quantitySell' => 22,
            'reservations_id' =>1
        ]);
        DB::table('sells')->insert([
            'total' => 580000,
            'date' => "12-12-16",
            'quantitySell' => 180,
            'reservations_id' =>1
        ]);
    }
}
