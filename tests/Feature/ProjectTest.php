<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use DatabaseTransactions;

    public function testCanViewProject(): void
    {
        $response = $this->get('/api/v1/projects');
        $response->assertStatus(200);
    }

    public function testProjectCreationWithValidData()
    {      
        $response = $this->post('/api/v1/projects', [
            'project_name' => 'Project A',
            'start_date' => '2024-08-18',
            'end_date' => '2024-09-18',
            'description' => 'A simple project',
            'status' => 'on track',
            'manager_id' => 1,
        ]);

        $response->assertStatus(201);
    }
}
