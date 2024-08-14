<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    public function testCanViewProject(): void
    {
        $response = $this->get('/api/v1/projects');
        $response->assertStatus(200);
    }
}
