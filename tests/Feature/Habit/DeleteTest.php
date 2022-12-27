<?php

namespace Tests\Feature\Habit;

use App\Models\Habit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    function it_can_be_deleted()
    {
        $habit = Habit::factory()->create();

        $response = $this->withoutExceptionHandling()->delete("/habits/{$habit->id}");

        $response->assertRedirect('/habits');
        // $this->assertDatabaseMissing('habits', [
            // 'id' => $habit->id,
        // ]);
    }
}
