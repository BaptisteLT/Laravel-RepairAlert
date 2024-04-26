<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Repair>
 */
class RepairFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'km_interval' => fake()->numberBetween(10000,100000),
            'month_time_interval' => fake()->numberBetween(3,24),
            'is_notified' => fake()->boolean(80)
        ];
    }
}
