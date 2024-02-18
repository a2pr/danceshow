<?php

namespace App\ViewModels;

class TeacherCourseViewModel
{
    private string $teacher_name;
    private string $course_name;

    public function __construct(string $teacher_name, string $course_name)
    {
        $this->teacher_name = $teacher_name;
        $this->course_name = $course_name;
    }
    public function getTeacherName(): string
    {
        return $this->teacher_name;
    }

    public function getCourseName(): string
    {
        return $this->course_name;
    }
}
