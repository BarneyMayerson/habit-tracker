<?php

namespace Tests\Feature\Habit;

use App\Http\Resources\HabitResource;
use App\Models\Habit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Request;
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

        $response = $this->withoutExceptionHandling()->postJson('/api/habits', $attributes);

        $response->assertOk();
        $this->assertDatabaseHas('habits', $attributes);
    }

    /** @test */
    function habits_are_fetched_after_habit_is_created()
    {
        $attributes = [
            'name' => 'test',
            'times_per_day' => 3,
        ];

        $request = Request::create('/api/habits', 'post');
        
        $response = $this->withoutExceptionHandling()->postJson('/api/habits', $attributes);
        
        $habitResource = HabitResource::collection(Habit::withCount('executions')->get());
        $expectedResource = $habitResource->response($request)->getData(true);


        $this->assertDatabaseHas('habits', $attributes);
        $response
            ->assertOk()
            ->assertJson($expectedResource);
    }

    /** 
     * @test
     * @dataProvider provideBadHabitData 
     */
    function create_habit_validation($missing, $attributes)
    {
        $response = $this->postJson('/api/habits', $attributes);

        $response->assertJsonValidationErrors([$missing]);
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
