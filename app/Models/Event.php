<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['event_type', 'event_date'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'event_type' => 'attendance'
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function attendance(): BelongsTo
    {
        return $this->belongsTo(Attendance::class, 'attendance_id');
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            // Set the default value to the current time when creating a new record
            $model->event_date = Carbon::now();
        });
    }
}
