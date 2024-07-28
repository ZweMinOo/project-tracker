<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'task_id' => Task::factory(),
            'project_id' => Project::factory(),
            'user_id' => User::factory(),
            'comment' => $this->faker->paragraph,
            'timestamp' => now(),
        ];
    }
}