<?php

namespace App\ViewModels;

class StudentCourseViewModel
{
    private string $student_name;
    private string $course_name;

    public function __construct(string $student_name, string $course_name)
    {
        $this->student_name = $student_name;
        $this->course_name = $course_name;
    }

    public function getStudentName(): string
    {
        return $this->student_name;
    }

    public function getCourseName(): string
    {
        return $this->course_name;
    }
}
