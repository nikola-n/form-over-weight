<?php

use Database\Seeders\GymSeeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\ProgramSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(GymSeeder::class);
    }
}
