<?php

namespace Database\Seeders;

use App\Program;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 10) as $program) {
            Program::create([
                'name'        => $faker->sentence,
                'description' => $faker->text,
            ]);
        }
    }
}
