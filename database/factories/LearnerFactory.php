<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LearnerFactory extends Factory
{
    public function definition(): array
    {
        return [
		'firstname' => $this->faker->firstName,
		'lastname' => $this->faker->lastName,
        ];
    }
}