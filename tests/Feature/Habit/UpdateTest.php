<?php

namespace Tests\Feature\Habit;

use App\Http\Resources\HabitResource;
use App\Models\Habit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Request;
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

        $request = Request::create("/api/habits/{$habit->id}", 'put');

        $response = $this->withExceptionHandling()->putJson("/api/habits/{$habit->id}", $newAttributes);

        $habitResource = HabitResource::collection(Habit::withCount('executions')->get());
        $expectedResource = $habitResource->response($request)->getData(true);

        $this->assertDatabaseHas('habits', ['id' => $habit->id, ...$newAttributes]);
        $response
            ->assertOk()
            ->assertJson($expectedResource);
    }

    /** 
     * @test
     * @dataProvider provideBadHabitData 
     */
    function update_habit_validation($missing, $attributes)
    {
        $habit = Habit::factory()->create();
        $response = $this->putJson("/api/habits/{$habit->id}", $attributes);

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
