<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        //DB::table('details_orders')->truncate();
        //DB::table('orders')->truncate();
        DB::table('orders')->insert([
            'total' => 250000,
            'dateorder' => "02-07-16",
            'quantityOrder' => 30,
            'suppliers_id' => 1
            ]);
        DB::table('orders')->insert([
            'total' => 255000,
            'dateorder' => "11-08-16",
            'quantityOrder' => 60,
            'suppliers_id' => 1
        ]);
        DB::table('orders')->insert([
            'total' => 270000,
            'dateorder' => "05-07-16",
            'quantityOrder' => 24,
            'suppliers_id' => 1
        ]);
        DB::table('orders')->insert([
            'total' => 255000,
            'dateorder' => "15-08-16",
            'quantityOrder' => 50,
            'suppliers_id' => 1
        ]);
        DB::table('orders')->insert([
            'total' => 280000,
            'dateorder' => "21-10-16",
            'quantityOrder' => 100,
            'suppliers_id' => 1
        ]);
        DB::table('orders')->insert([
            'total' => 243000,
            'dateorder' => "27-11-16",
            'quantityOrder' => 56,
            'suppliers_id' => 1
        ]);


    }
}
