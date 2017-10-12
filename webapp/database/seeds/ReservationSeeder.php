<?php

use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('reservations')->insert([
            'reservationDate' => "25-12-16",
            'users_id' => 1,
            'customers_id' => 1
        ]);
    }
}
