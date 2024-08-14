<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    public function testCanViewTask(): void
    {
        $response = $this->get('/api/v1/tasks');
        $response->assertStatus(200);
    }
}
