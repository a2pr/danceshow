<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = Teacher::all();
        $courses = Course::all();

        foreach ($teachers as $teacher){
            $randomCourse = $courses->random();
            TeacherCourse::create([
                'teacher_id' => $teacher->id,
                'course_id' => $randomCourse->id,
            ]);
        }
    }
}
