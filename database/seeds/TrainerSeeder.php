<?php

namespace Database\Seeders;

use App\Trainer;
use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $user = User::where('role', 'trainer')->first();
        $user_id = $user->id;

        foreach (range(1, 10) as $trainer) {
            Trainer::create([
                'name'    => $faker->firstName,
                'user_id' => $user_id
            ]);
        }
    }
}
