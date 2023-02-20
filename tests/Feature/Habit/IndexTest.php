<?php

namespace Tests\Feature\Habit;

use App\Http\Resources\HabitResource;
use App\Models\Habit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Request;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_shows_all_habits()
    {
        $response = $this->withoutExceptionHandling()->get('/habits');

        $response->assertStatus(200);
    }

    /** @test */
    function habits_list_is_fetched()
    {
        Habit::factory(3)->create();
        $habitResource = HabitResource::collection(Habit::withCount('executions')->get());
        $request = Request::create('/api/habits', 'get');
        $expectedResource = $habitResource->response($request)->getData(true);

        $response = $this->getJson('/api/habits');

        $response
            ->assertStatus(200)
            ->assertJson($expectedResource);
    }
}
