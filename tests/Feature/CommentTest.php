<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    public function testCanViewComment(): void
    {
        $response = $this->get('/api/v1/comments');
        $response->assertStatus(200);
    }
}
