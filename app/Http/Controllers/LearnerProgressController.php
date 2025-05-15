<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Learner;
use Illuminate\Support\Facades\DB;

class LearnerProgressController extends Controller
{
    public function index(Request $request)
    {
        $courseFilter = $request->input('course');
        $sortOrder = $request->input('sort');

        $learners = Learner::with(['enrolments.course']);

        if ($courseFilter) {
            $learners = $learners->whereHas('enrolments.course', function ($query) use ($courseFilter) {
                $query->where('name', $courseFilter);
            });
        }

        $learners = $learners->get();

        $learners = $learners->map(function ($learner) {
            $learner->courses = $learner->enrolments->map(function ($enrolment) {
                return [
                    'name' => $enrolment->course->name,
                    'progress' => $enrolment->progress_percentage,
                ];
            });
            $learner->average_progress = $learner->courses->avg('progress');
            return $learner;
        });

        if ($sortOrder === 'asc') {
            $learners = $learners->sortBy('average_progress');
        } elseif ($sortOrder === 'desc') {
            $learners = $learners->sortByDesc('average_progress');
        }

        $courses = DB::table('courses')->pluck('name');

        return view('learner-progress', compact('learners', 'courses', 'courseFilter', 'sortOrder'));
    }
}