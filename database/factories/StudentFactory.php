<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'cpf' => (string)fake()->unique()->randomNumber(),
            'phone' => fake()->phoneNumber(),
            'birthday' => fake()->dateTime()
        ];
    }
}
