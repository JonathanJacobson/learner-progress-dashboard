<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Course;
use App\Models\Learner;

class Enrolment extends Model
{
    use HasFactory;

    protected $fillable = ['learner_id', 'course_id', 'progress_percentage'];

    public function learner()
    {
        return $this->belongsTo(Learner::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // ✅ ADD THIS TO FIX THE ERROR:
    protected static function newFactory()
    {
        return \Database\Factories\EnrolmentFactory::new();
    }
}
