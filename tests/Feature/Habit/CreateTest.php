<?php

namespace Tests\Feature\Habit;

use Attribute;
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

    /** @test */
    function name_is_required()
    {
        $attributes = [
            'name' => null,
            'times_per_day' => 3,
        ];

        $response = $this->post('/habits', $attributes);

        $response->assertSessionHasErrors(['name']);
    }

    /** @test */
    function times_per_day_is_required()
    {
        $attributes = [
            'name' => 'test',
            'times_per_day' => null,
        ];

        $response = $this->post('/habits', $attributes);

        $response->assertSessionHasErrors(['times_per_day']);
    }
}
