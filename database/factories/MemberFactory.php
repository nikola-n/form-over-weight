<?php

namespace Database\Factories;

use App\Gym;
use App\User;
use App\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'    => $this->faker->name,
            'gym_id'  => Gym::factory(),
            'user_id' => User::factory(),
        ];
    }
}
