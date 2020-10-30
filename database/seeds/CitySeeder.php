<?php

namespace Database\Seeders;

use App\City;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $city) {
            City::create([
                'name' => $faker->city,
            ]);
        }
    }
}
