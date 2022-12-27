<?php

namespace Tests\Feature\Habit;

use App\Models\Habit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_can_be_updated()
    {
        $habit = Habit::factory()->create();

        $newAttributes = [
            'name' => 'New Name',
            'times_per_day' => 5,
        ];


        $response = $this->withExceptionHandling()->put("/habits/{$habit->id}", $newAttributes);

        $response->assertRedirect('habits');
        $this->assertDatabaseHas('habits', ['id' => $habit->id, ...$newAttributes]);
    }

    /** 
     * @test
     * @dataProvider provideBadHabitData 
     */
    function update_habit_validation($missing, $attributes)
    {
        $habit = Habit::factory()->create();
        $response = $this->put("/habits/{$habit->id}", $attributes);

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
