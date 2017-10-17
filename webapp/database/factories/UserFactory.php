<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(App\People::class, function (Faker $faker) {

    return [
        'ci'            =>  $faker->randomNumber($nbDigits = 7, $strict = false),
        'name'          =>  $faker->unique()->name,
        'lastName'      =>  $faker->unique()->lastName,
        'birthday'      =>  $faker->date($format = 'Y-m-d', $max = 'now'),
        'phone'         =>  $faker->phoneNumber,
        'sex'           =>  '',
        'address'   =>  $faker->address,
    ];
});


$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'userType' => 'empleado',
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->unique()->name(),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'people_id' => \App\People::all()->unique()->random()->id,
    ];
});

$factory->define(App\Customer::class, function (Faker $faker) {

    return [
        'clientType'    =>  $faker->randomElement(['nuevo', 'habitual']),
        'points'   =>  $faker->numberBetween(1,100),
        'people_id' => \App\People::all()->unique()->random()->id,
    ];
});

$factory->define(App\Catalog::class, function (Faker $faker) {

    return [
        'name'          =>  $faker->unique()->name,
        'description'   =>  $faker->paragraph(1),
    ];
});

/*$factory->define(App\Table::class, function (Faker $faker) {

    return [
        'quantityChairs'   => $faker->numberBetween(1,6),
    ];
});*/