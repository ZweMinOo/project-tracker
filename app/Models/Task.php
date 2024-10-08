<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name',
        'description',
        'status',
        'start_date',
        'end_date',
        'project_id',
        'assigned_to'
    ];

    public function project(){
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function assignedTo(){
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
