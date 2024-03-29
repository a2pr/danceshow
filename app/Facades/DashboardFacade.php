<?php

namespace App\Facades;

use App\Models\Package;
use App\Models\Student;
use Carbon\Carbon;

class DashboardFacade
{
    const REAMING_AMOUNT_SOON = 2;
    public function getStudentsStats(): array
    {
        return [
            'all' => $this->getStudents(),
            'active' => $this->getActiveStudents(),
            'inactive' => $this->getInactiveStudents(),
            'without' => $this->getStudentsWithoutPackages(),
            'package_type' => [
                'amount' =>$this->getPackageAmountTypeCount(),
                'interval' => $this->getPackageIntervalTypeCount()
            ]
        ];
    }

    public function getStudentsWithPackagesEndingCurrentMonth(): array
    {
        $students = Student::all();
        $studentsWithEndingPackages = [];
        foreach ($students as $student) {
            $packages = $student->packages()->get();
            foreach ($packages as $package) {

                if ($package->active) {
                    $type = $package->packageDefinition()->first()->type;
                    $package_name = $package->packageDefinition()->first()->name;
                    if( $type == Package::INTERVAL_TYPE){
                        $end_date = Carbon::parse($package->end_date);
                        if($end_date->format('m') == Carbon::now()->format('m')){
                            $studentsWithEndingPackages[] = [
                                'student_name' => $student->name,
                                'package_name' => $package_name,
                                'end_date' => $package->end_date
                            ];
                            break;
                        }
                    }
                }
            }

        }

        return $studentsWithEndingPackages;
    }

    public function getStudentsWithPackagesEndingSoon(): array
    {
        $students = Student::all();
        $studentsWithEndingPackages = [];
        foreach ($students as $student) {
            $packages = $student->packages()->get();
            foreach ($packages as $package) {

                if ($package->active) {
                    $type = $package->packageDefinition()->first()->type;
                    $package_name = $package->packageDefinition()->first()->name;
                    if( $type == Package::AMOUNT_TYPE){
                        if($package->remaining_amount <= self::REAMING_AMOUNT_SOON){
                            $studentsWithEndingPackages[] = [
                                'student_name' => $student->name,
                                'package_name' => $package_name,
                                'remaining_amount' => $package->remaining_amount
                            ];
                            break;
                        }
                    }
                }
            }

        }

        return $studentsWithEndingPackages;
    }
    private function getStudents(): int
    {
        return Student::all()->count();
    }

    private function getActiveStudents(): int
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

    private function getInactiveStudents(): int
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

    private function getStudentsWithoutPackages(): int
    {
        $students = Student::all();
        $count = 0;
        foreach ($students as $student) {
            $packages = $student->packages()->get();
            if ($packages->isEmpty()) {
                $count++;
            }
        }
        return $count;
    }

    private function getPackageAmountTypeCount()
    {
        return Package::join('package_definitions', function($join){
            $join->on('packages.package_definition_id','=','package_definitions.id')
                ->where('package_definitions.type', '=',Package::AMOUNT_TYPE);
        })->select('packages.*')
            ->count();
    }

    private function getPackageIntervalTypeCount()
    {
        return Package::join('package_definitions', function($join){
            $join->on('packages.package_definition_id','=','package_definitions.id')
                ->where('package_definitions.type', '=',Package::INTERVAL_TYPE);
        })->select('packages.*')
            ->count();
    }

    public function getStudentsAddedCurrentMonth()
    {
        $currentMonth = now()->month;
        $currentYear = now()->year;

        return Student::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)->count();
    }

}
