<?php

namespace Tests\Unit;

use App\Models\Student;
use Tests\TestCase;

class ModelTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        //Student::truncate();
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
}
