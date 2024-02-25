<?php

namespace App\Facades;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourse;

class CourseFacade
{
    public function getCoursesStats(): array
    {
        return [
            'all' => $this->getCourses(),
            'courses' => $this->getStudentsInCourse(),
            'leaderboard' => $this->getAttendancePerCourse()
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
        foreach ($courses as $course) {
            $studentCount = StudentCourse::where('course_id', $course->id)->count();
            $result [$course->course_name] = ['student_count' => $studentCount, 'students' => $this->getStudentsByCourseId($course->id)];
        }

        return $result;
    }

    private function getStudentsByCourseId(int $courseId): array
    {
        $result = [];
        $studentCourse = StudentCourse::where('course_id', $courseId)->get();

        foreach ($studentCourse as $record) {
            $student = Student::find($record->student_id);
            $result[] = $student->name;
        }

        return $result;
    }

    public function getAttendancePerCourse(): array
    {
        $result = $resultMonth = $data = [];
        $courses = Course::all();

        if($courses->isEmpty()){
            return [];
        }

        foreach ($courses as $course) {
            $counts = Attendance::where('course_id', $course->id)->count();
            $result[$course->course_name] = $counts;
        }

        $maxKey = array_keys($result, max($result))[0];
        $minKey = array_keys($result, min($result))[0];

        $maxValue = $result[$maxKey];
        $minValue = $result[$minKey];


        foreach ($courses as $course) {

            $currentMonth = now()->month;
            $currentYear = now()->year;
            $counts = Attendance::where('course_id', $course->id)
                ->whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)->count();

            $resultMonth[$course->course_name] = $counts;
        }


        $maxKeyMonth = array_keys($resultMonth, max($resultMonth))[0];
        $minKeyMonth = array_keys($resultMonth, min($resultMonth))[0];

        $maxValueMonth = $resultMonth[$maxKeyMonth];
        $minValueMonth = $resultMonth[$minKeyMonth];

        $data = [
            'max' => [
                'course_name' => array_keys($result, $maxValue)[0],
                'value' => $maxValue,
            ],
            'min' => [
                'course_name' => array_keys($result, $minValue)[0],
                'value' => $minValue,
            ],
            'current_month' => [

                'max' => [
                    'course_name' => array_keys($resultMonth, $maxValueMonth)[0],
                    'value' => $maxValueMonth,
                ],
                'min' => [
                    'course_name' => array_keys($resultMonth, $minValueMonth)[0],
                    'value' => $maxValueMonth,
                ],
            ]
        ];

        return $data;
    }
}
