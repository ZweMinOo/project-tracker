<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDependency extends Model
{
    use HasFactory;
    protected $primaryKey = 'dependency_id';

    protected $fillable = [
        'dependent_task_id',
        'dependency_task_id',
    ];

    public function dependentTask()
    {
        return $this->belongsTo(Task::class, 'dependent_task_id');
    }

    public function dependencyTask()
    {
        return $this->belongsTo(Task::class, 'dependency_task_id');
    }
}
