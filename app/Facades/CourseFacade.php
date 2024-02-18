<?php

namespace App\Facades;

use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourse;

class CourseFacade
{
    public function getCoursesStats(): array
    {
        return [
            'all' => $this->getCourses(),
            'courses' => $this->getStudentsInCourse()
        ];
    }

    private function getCourses()
    {
        return Course::all()->count();
    }

    private function getStudentsInCourse(): array
    {
        $result = [];
        $courses = Course::all();
        foreach ($courses as $course){
            $studentCount = StudentCourse::where('course_id', $course->id)->count();
            $result [$course->course_name] = ['student_count'=>$studentCount , 'students'=> $this->getStudentsByCourseId($course->id)];
        }

        return $result;
    }

    private function getStudentsByCourseId(int $courseId): array
    {
        $result = [];
        $studentCourse = StudentCourse::where('course_id', $courseId)->get();

        foreach ($studentCourse as $record){
            $student = Student::find($record->student_id);
            $result[] = $student->name;
        }

        return $result;
    }
}
