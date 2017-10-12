<?php

use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        //DB::table('details_orders')->truncate();
        //DB::table('orders')->truncate();
        //DB::table('suppliers')->truncate();

        DB::table('suppliers')->insert([
            'id'=> 1,
            'companyName' => "RACA",
            'contactName' => "Pepe Murillo",
            'address' => "Av circunvalacion",
            'productSupplied' => "tragos",
            'phono' => 6666666
        ]);
    }
}
