<?php

use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('people')->insert([
            'ci' => "1323232",
            'name' => "Ricardo",
            'lastName' => "Mollinedo",
            'birthday' => "14-02-16",
            'phone' => "3434343",
            'sex'=>"Masculino",
            'address'=>"Av panama"
        ]);
    }
}
