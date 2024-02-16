<?php

namespace App\Facades;

use App\Models\Student;

class DashboardFacade
{
    public function getStudentsStats(){
        return [
            'all' => $this->getStudents(),
            'active' => $this->getActiveStudents(),
            'inactive' => $this->getInactiveStudents(),
            'without' => $this->getStudentsWithoutPackages(),
        ];
    }
    private function getStudents()
    {
        return Student::all()->count();
    }

    private function getActiveStudents()
    {
        $students = Student::all();
        $count = 0;
        foreach ($students as $student) {
            $packages = $student->packages()->get();
            $active = false;
            foreach ($packages as $package) {
                if ($package->active) {
                    $active = true;
                }
            }
            if ($active) {
                $count++;
            }
        }
        return $count;
    }

    private function getInactiveStudents()
    {
        $students = Student::all();
        $count = 0;
        foreach ($students as $student) {
            $packages = $student->packages()->get();
            $active = false;
            foreach ($packages as $package) {
                if ($package->active) {
                    $active = true;
                }
            }
            if (!$packages->isEmpty() && !$active) {
                $count++;
            }
        }
        return $count;
    }

    private function getStudentsWithoutPackages()
    {
        $students = Student::all();
        $count = 0;
        foreach ($students as $student) {
            $packages = $student->packages()->get();
            //dd($packages->isEmpty());
            if ($packages->isEmpty()) {
                $count++;
            }
        }
        return $count;
    }


}
