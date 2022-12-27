<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habit>
 */
class HabitFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => 'test',
            'times_per_day' => 3,
        ];
    }
}
