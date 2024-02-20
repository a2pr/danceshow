<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Package;
use App\Models\PackageDefinition;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OneHundredStudentsSeeder extends Seeder
{
    const TEACHERS = [
        'Erica',
        'Witheney',
        'Dara',
        'Regina',
        'Yara',
    ];

    const COURSES = [
        'Forro',
        'Bachata',
        'Sertanejo',
        'Tango',
        'Zouk'
    ];

    const TEACHER_COURSE = [
        self::TEACHERS[0] => self::COURSES[0],
        self::TEACHERS[1] => self::COURSES[1],
        self::TEACHERS[2] => self::COURSES[2],
        self::TEACHERS[3] => self::COURSES[3],
        self::TEACHERS[4] => self::COURSES[4],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //teacher
        foreach (self::TEACHERS as $name) {
            Teacher::factory(1)->create([
                'name' => $name
            ]);
        }

        //courses
        foreach (self::COURSES as $name) {
            Course::factory(1)->create([
                'course_name' => $name
            ]);
        }

        foreach (self::TEACHER_COURSE as $index => $item) {
            $teacher = Teacher::where('name', $index)->first();
            $course = Course::where('course_name', $item)->first();

            TeacherCourse::create([
                'teacher_id' => $teacher->id,
                'course_id' => $course->id,
            ]);
        }
        // packages

        $packageDefinitionAmount = PackageDefinition::create([
            'name' => '10aulas',
            'description' => '10 aulas avulsas',
            'type' => PackageDefinition::AMOUNT_TYPE,
            'package_amount' => 10,
            'package_duration' => null,
        ]);

        $packageDefinitionInterval = PackageDefinition::create([
            'name' => '1monthInterval',
            'description' => '1 month Interval for classes',
            'type' => PackageDefinition::INTERVAL_TYPE,
            'package_amount' => null,
            'package_duration' => PackageDefinition::ONE_MONTH_INTERVAL,
        ]);

        $packageDefinitions = [
            $packageDefinitionAmount,
            $packageDefinitionInterval,
        ];

        //students

        // Create 100 students using the StudentFactory
        Student::factory(100)->create();

        $Students = Student::all();
        $courses = Course::all();
        $i = 0;
        $j = 0;
        $k = 0;
        foreach ($Students as $student) {

            $date = new Datetime('now');
            $randomCourse = $courses->random();
            StudentCourse::create([
                'student_id' => $student->id,
                'course_id' => $randomCourse->id,
            ]);
            $packageDefinition = $packageDefinitions[rand(0, 1)];
            if ($i < 75) {
                if ($packageDefinition->isAmountType()) {

                    $package = Package::factory(1)->create([
                        'remaining_amount' => $packageDefinition->package_amount,
                        'start_date' => null,
                        'end_date' => null,
                        'package_definition_id' => $packageDefinition->id,
                        'student_id' => $student->id
                    ]);
                } else {
                    $interval = new \DateInterval($packageDefinition->package_duration);
                    $newDate = $date->add($interval);

                    $package = Package::factory(1)->create([
                        'remaining_amount' => null,
                        'end_date' => $newDate,
                        'package_definition_id' => $packageDefinition->id,
                        'student_id' => $student->id
                    ]);
                }
                if($j < 25 && rand(0,1) ==1){
                    $package->first()->update(['active' => 0]);
                    $j++;
                }

                if($k < 10){
                    if(!empty($package->first()->remaining_amount)){
                        $package->first()->update(['remaining_amount' => rand(1,2)]);
                    }else{
                        $endDate = new DateTime('now');
                        $interval = new \DateInterval('P2D');
                        $dateExpire = $endDate->add($interval);
                        var_dump($dateExpire);
                        $package->first()->update(['end_date'=>$dateExpire]);
                    }
                    $k++;
                }
            }
            $i++;
        }

        $studentCourses = StudentCourse::all();
        foreach ($studentCourses as $records){

            Attendance::factory(2)->create([
                'course_id' => $records->course_id,
                'student_id' => $records->student_id
            ]);
        }

    }
}
