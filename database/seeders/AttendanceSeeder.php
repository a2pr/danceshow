<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        $course = Course::all();

        foreach ($students as $student){

            $randomCourse = $course->random();
            if(empty($course)){
                continue;
            }

            Attendance::factory(1)->create([
                'course_id' => $randomCourse->id,
                'student_id' => $student->id,
                'attendance_date' =>Carbon::now()
            ]);
        }
    }
}
