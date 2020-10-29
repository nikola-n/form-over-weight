<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Trainer;
use Faker\Generator as Faker;

$factory->define(Trainer::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
        'experience' => $faker->numberBetween(3, 10),
        'age'        => $faker->randomNumber(),
    ];
});
