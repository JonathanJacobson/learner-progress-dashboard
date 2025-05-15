<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Enrolment;

class Learner extends Model
{
    use HasFactory;

    protected $fillable = ['full_name'];

    // 🔽 ADD THIS RELATIONSHIP:
    public function enrolments()
    {
        return $this->hasMany(Enrolment::class);
    }
}
