<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Learner;
use App\Models\Course;
use App\Models\Enrolment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Learner::factory(10)->create();
        Course::factory(5)->create();

        $learners = Learner::all();
        $courses = Course::all();

        // Create unique learner-course enrolments
        foreach ($learners as $learner) {
            $randomCourses = $courses->random(rand(1, 3));

            foreach ($randomCourses as $course) {
                Enrolment::create([
                    'learner_id' => $learner->id,
                    'course_id' => $course->id,
                    'progress_percentage' => rand(10, 100),
                ]);
            }
        }
    }
}
