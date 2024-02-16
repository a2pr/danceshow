<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\PackageDefinition;
use App\Models\Student;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packageDefinition = PackageDefinition::factory(5)->create();
        foreach ($packageDefinition as $def){
            $student = Student::inRandomOrder()->first();
            if($def->type == Package::AMOUNT_TYPE){
                Package::factory(1)->create([
                    'remaining_amount' => $def->remaining_amount,
                    'start_date' => null,
                    'end_date' => null,
                    'package_definition_id' => $def->id,
                    'student_id' => $student->id
                ]);
            }else{
                $date = new Datetime('now');
                $interval = new \DateInterval($def->package_duration);
                $newDate = $date->add($interval);

                Package::factory(1)->create([
                    'remaining_amount' => 0,
                    'end_date' => $newDate,
                    'package_definition_id' => $def->id,
                    'student_id' => $student->id
                ]);
            }
        }

    }
}
