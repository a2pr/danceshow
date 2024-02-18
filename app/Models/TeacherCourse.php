<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TeacherCourse extends Model
{
    use HasFactory;
    protected $table = 'teacher_courses';

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class,'teacher_courses','course_id');
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class,'teacher_courses','teacher_id');
    }
}
