<?php

namespace Database\Factories;

use App\User;
use App\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trainer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'    => $this->faker->name,
            'user_id' => User::factory(),
        ];
    }
}
