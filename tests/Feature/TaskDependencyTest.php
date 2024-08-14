<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskDependencyTest extends TestCase
{
    public function testCanViewTaskDependency(): void
    {
        $response = $this->get('/api/v1/task-dependencies');
        $response->assertStatus(200);
    }
}
