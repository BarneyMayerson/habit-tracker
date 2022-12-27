<?php

namespace Tests\Feature\Habit;

use App\Models\Habit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    function it_can_be_created()
    {
        $attributes = [
            'name' => 'test',
            'times_per_day' => 3,
        ];

        $response = $this->withoutExceptionHandling()->post('/habits', $attributes);

        $response->assertRedirect('/habits');
        $this->assertDatabaseHas('habits', $attributes);
    }

    /** 
     * @test
     * @dataProvider provideBadHabitData 
     */
    function create_habit_validation($missing, $attributes)
    {
        $response = $this->post('/habits', $attributes);

        $response->assertSessionHasErrors([$missing]);
    }

    function provideBadHabitData()
    {
        $habit = Habit::factory()->make();

        return [
            'missing name' => [
                'name',
                [
                    ...$habit->toArray(),
                    'name' => null,
                ]
            ],
            'missing times_per_day' => [
                'times_per_day',
                [
                    ...$habit->toArray(),
                    'times_per_day' => null,
                ]
            ]
        ];
    }
}
