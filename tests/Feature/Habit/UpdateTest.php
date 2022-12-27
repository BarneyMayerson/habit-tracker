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
}
