<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\PackageDefinition;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PackageDefinition>
 */
class PackageDefinitionFactory extends Factory
{
    const INTERVAL = [
      PackageDefinition::ONE_WEEK_INTERVAL,
      PackageDefinition::ONE_MONTH_INTERVAL,
      PackageDefinition::TWO_WEEK_INTERVAL,
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isAmount = rand(0,1);
        $interval = null;
        $amount = 0;
        if($isAmount){
            $amount = rand(0,10);
            $type = Package::AMOUNT_TYPE;
        }else{
            $rand_key = array_rand(self::INTERVAL);
            $interval = self::INTERVAL[$rand_key];
            $type = Package::INTERVAL_TYPE;
        }

        return [
            'name' => fake()->name(),
            'description' => fake()->sentence(),
            'type' => $type,
            'package_amount' => $amount,
            'package_duration' => $interval,
        ];
    }
}
