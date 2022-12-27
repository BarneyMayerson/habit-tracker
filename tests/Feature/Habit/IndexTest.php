<?php

namespace Tests\Feature\Habit;

use App\Models\Habit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_shows_all_habits()
    {
        $habits = Habit::factory(3)->create();


        $response = $this->withoutExceptionHandling()->get('/habits');

        $response->assertStatus(200);
        $response->assertViewHas('habits', $habits);
    }
}
