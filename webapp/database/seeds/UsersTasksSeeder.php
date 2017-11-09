<?php

use Illuminate\Database\Seeder;

class UsersTasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_tasks')->insert([
            'date' => '2017-11-09',
            'state' => 'incompleto',
            'dateEnd' => '2017-09-20',
            'dateBegin' => '2017-10-20',
            'users_id' => 30,
            'tasks_id' => 1,
        ]);
        DB::table('users_tasks')->insert([
            'date' => '2017-11-09',
            'state' => 'completo',
            'dateEnd' => '2017-11-09',
            'dateBegin' => '2017-10-29',
            'users_id' => 31,
            'tasks_id' => 2,
        ]);
        DB::table('users_tasks')->insert([
            'date' => '2017-11-09',
            'state' => 'incompleto',
            'dateEnd' => '2017-12-09',
            'dateBegin' => '2017-11-11',
            'users_id' => 32,
            'tasks_id' => 3,
        ]);
        DB::table('users_tasks')->insert([
            'date' => '2017-11-09',
            'state' => 'completo',
            'dateEnd' => '2017-11-09',
            'dateBegin' => '2017-10-09',
            'users_id' => 33,
            'tasks_id' => 4,
        ]);
        DB::table('users_tasks')->insert([
            'date' => '2017-11-09',
            'state' => 'incompleto',
            'dateEnd' => '2017-11-15',
            'dateBegin' => '2017-11-09',
            'users_id' => 34,
            'tasks_id' => 1,
        ]);
    }
}
