<?php

namespace Tests\Unit;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Package;
use App\Models\PackageDefinition;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use DateInterval;
use DateTime;
use Tests\TestCase;

class ModelTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        Student::truncate();
        Package::truncate();
        PackageDefinition::truncate();
        Teacher::truncate();
        Attendance::truncate();
    }

    public function testStudentClass()
    {
        $student = new Student();
        $student->name = 'andres';
        $student->cpf = '705202';
        $student->phone = '559298404';
        $student->birthday = '05/04/1995';

        $student->save();
        $this->assertEquals('andres',$student->name);
    }

    public function testPackageDescriptionClassDefaultValues()
    {
        $packageDetails =  new PackageDefinition();
        $packageDetails->name = 'test package';
        $packageDetails->description = 'test test test';
        $packageDetails->save();

        $this->assertEquals(0,$packageDetails->amount);
        $this->assertEquals('amount',$packageDetails->type);
    }

    public function testPackageDescriptionClassDuration()
    {
        $packageDetails =  new PackageDefinition();
        $packageDetails->name = 'test package';
        $packageDetails->description = 'test test test';
        $packageDetails->package_duration = PackageDefinition::ONE_MONTH_INTERVAL;
        $packageDetails->type = 'interval';
        $packageDetails->save();

        $this->assertEquals('P1M',$packageDetails->package_duration);
        $this->assertEquals('interval',$packageDetails->type);
    }

    public function testPackageClassDefaultValue()
    {
        $packageDetails =  new PackageDefinition();
        $packageDetails->name = 'test package';
        $packageDetails->description = 'test test test';
        $packageDetails->save();

        $student = new Student();
        $student->name = 'andres';
        $student->cpf = '705202';
        $student->phone = '559298404';
        $student->birthday = '05/04/1995';

        $student->save();

        $package = new Package();
        $package->remaining_amount = 0;
        $package->student_id = $student->id;
        $package->package_definition_id = $packageDetails->id;

        $package->save();

        $this->assertEquals(0, $package->remaining_amount);
        $this->assertNull($package->start_date);
        $this->assertNull($package->end_date);
        $this->assertTrue($package->active);
    }

    public function testPackageClassForIntervals()
    {
        $packageDetails =  new PackageDefinition();
        $packageDetails->name = 'test package';
        $packageDetails->description = 'test test test';
        $packageDetails->package_duration = PackageDefinition::ONE_MONTH_INTERVAL;
        $packageDetails->type = 'interval';
        $packageDetails->save();

        $student = new Student();
        $student->name = 'andres';
        $student->cpf = '705202';
        $student->phone = '559298404';
        $student->birthday = '05/04/1995';

        $student->save();

        $package = new Package();
        $package->student_id = $student->id;
        $current = new \DateTime('now');
        $end_date = clone $current;
        $interval = new DateInterval(PackageDefinition::ONE_MONTH_INTERVAL);
        $end_date->add($interval);

        $package->start_date = $current;
        $package->end_date = $end_date;
        $package->package_definition_id = $packageDetails->id;

        $package->save();

        $this->assertNull($package->remaining_amount);
        $this->assertNotNull($package->start_date);
        $this->assertNotNull($package->end_date);
        $this->assertTrue($package->active);
    }

    public function testTeacher()
    {
        $teacher =  new Teacher();
        $teacher->name = 'Erica';
        $teacher->cpf = '1000';

        $teacher->save();

        $this->assertNotNull($teacher->name);
        $this->assertEquals('Erica', $teacher->name);
    }

    public function testCourses()
    {
        $course =  new Course();
        $course->course_name = 'bachata';

        $course->save();
        $this->assertEquals('bachata', $course->course_name);
    }

    public function testTeacherCourseRelation()
    {
        $teacher =  new Teacher();
        $teacher->name = 'Erica';
        $teacher->cpf = '1000';

        $teacher->save();

        $course =  new Course();
        $course->course_name = 'bachata';

        $course->save();

        $teacherCourse = new TeacherCourse();
        $teacherCourse->course_id = $course->id;
        $teacherCourse->teacher_id = $teacher->id;

        $teacherCourse->save();

        $this->assertEquals($teacher->id, $teacherCourse->teacher_id);
        $this->assertEquals($course->id, $teacherCourse->course_id);
    }

    public function testAttendanceAndTimeRecorded()
    {
        $student = new Student();
        $student->name = 'andres';
        $student->cpf = '705202';
        $student->phone = '559298404';
        $student->birthday = '05/04/1995';

        $student->save();

        $student2 = new Student();
        $student2->name = 'diego';
        $student2->cpf = '705203';
        $student2->phone = '559298404';
        $student2->birthday = '05/04/1995';

        $student2->save();

        $teacher =  new Teacher();
        $teacher->name = 'Erica';
        $teacher->cpf = '1000';

        $teacher->save();

        $course =  new Course();
        $course->course_name = 'bachata';

        $course->save();

        $teacherCourse = new TeacherCourse();
        $teacherCourse->course_id = $course->id;
        $teacherCourse->teacher_id = $teacher->id;

        $teacherCourse->save();

        foreach ([$student, $student2] as $stu) {

            $attendance = new Attendance();
            $attendance->student_id = $stu->id;
            $attendance->course_id = $course->id;
            $attendance->save();
        }

        $records = Attendance::all();
        $this->assertEquals(2, $records->count());

        foreach ($records as $record){
            $dateTime = new DateTime($record->attendance_date);

            $currentDate = new DateTime();
            $isToday = $dateTime->format('Y-m-d') === $currentDate->format('Y-m-d');
            $this->assertTrue($isToday);
        }
    }
}
