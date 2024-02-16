<?php

namespace App\Listeners;

use App\Events\AttendanceEvent;
use App\Models\Event;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateEventRecord
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AttendanceEvent $event): void
    {
        $newEvent = new Event();
        $newEvent->attendance_id = $event->attendance->id;
        $newEvent->student_id = $event->attendance->student_id;

        $newEvent->save();
    }
}
