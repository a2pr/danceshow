<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Database\Seeder;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Students = Student::all();
        $courses = Course::all();

        foreach ($Students as $student){
            $randomCourse = $courses->random();
            StudentCourse::create([
                'student_id' => $student->id,
                'course_id' => $randomCourse->id,
            ]);
        }
    }
}
