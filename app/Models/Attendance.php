<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attendance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['attendance_date'];


    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'attendance_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }


    public function courses(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            // Set the default value to the current time when creating a new record
            $model->attendance_date = Carbon::now();
        });
    }
}
