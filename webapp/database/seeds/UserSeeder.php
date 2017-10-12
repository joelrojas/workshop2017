<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'userType' => "Admin",
            'email' => "rsds@gmail.com",
            'username' => "pepe",
            'password' => "problemas",
            'people_id' =>1
        ]);
    }
}
