<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\Gym;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name'   => $faker->city,
        'gym_id' => factory(Gym::class)->create()->id,
    ];
});
