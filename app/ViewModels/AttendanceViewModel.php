<?php

namespace App\ViewModels;

class AttendanceViewModel
{
    private string $student_name;
    private string $course_name;
    private string $attendance_date;

    public function __construct(string $student_name, string $course_name, string $attendance_date)
    {
        $this->student_name = $student_name;
        $this->course_name = $course_name;
        $this->attendance_date = $attendance_date;
    }

    public function getStudentName(): string
    {
        return $this->student_name;
    }

    public function getCourseName(): string
    {
        return $this->course_name;
    }

    public function getAttendanceDate(): string
    {
        return $this->attendance_date;
    }
}
