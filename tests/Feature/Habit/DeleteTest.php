<?php

namespace Tests\Feature\Habit;

use App\Http\Resources\HabitResource;
use App\Models\Habit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Request;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    function it_can_be_deleted()
    {
        $habit = Habit::factory()->create();
        $request = Request::create("/api/habits/{$habit->id}", 'delete');

        $response = $this->withoutExceptionHandling()->deleteJson("/api/habits/{$habit->id}");

        $this->assertDatabaseMissing('habits', [
            'id' => $habit->id,
        ]);

        $habitResource = HabitResource::collection(Habit::withCount('executions')->get());
        $expectedResource = $habitResource->response($request)->getData(true);
        
        $response
            ->assertOk()
            ->assertJson($expectedResource);
    }
}
