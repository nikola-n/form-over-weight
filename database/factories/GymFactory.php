<?php

namespace Database\Factories;

use App\Gym;
use App\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class GymFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gym::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->safeColorName,
            'city_id' => City::factory()
        ];
    }
}
