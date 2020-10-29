<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gym;
use Faker\Generator as Faker;

$factory->define(Gym::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
    ];
});
