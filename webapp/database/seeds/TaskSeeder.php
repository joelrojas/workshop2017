<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'id' => 1,
            'task' => 'Puerta',
            'description' => 'ninguna',
        ]);
        DB::table('tasks')->insert([
            'id' => 2,
            'task' => 'Lavar',
            'description' => 'ninguna',
        ]);
        DB::table('tasks')->insert([
            'id' => 3,
            'task' => 'Barrer',
            'description' => 'ninguna',
        ]);
        DB::table('tasks')->insert([
            'id' => 4,
            'task' => 'Bar',
            'description' => 'ninguna',
        ]);
    }
}
