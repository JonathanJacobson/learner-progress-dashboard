<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Learner;
use App\Models\Course;

class EnrolmentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'learner_id' => Learner::inRandomOrder()->first()->id ?? Learner::factory(),
            'course_id' => Course::inRandomOrder()->first()->id ?? Course::factory(),
            'progress_percentage' => $this->faker->numberBetween(10, 100),
        ];
    }
}