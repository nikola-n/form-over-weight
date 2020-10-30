<?php

namespace Database\Seeders;

use App\Gym;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class GymSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 3) as $gym) {
            Gym::create([
                'name'    => $faker->streetName,
                'city_id' => 1,
            ]);
        }
    }
}
