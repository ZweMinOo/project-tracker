<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\TaskDependency;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskDependencyController extends Controller
{
    public function index()
    {
        $taskDependencies = TaskDependency::all();
        return response()->json(['data' => $taskDependencies]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'dependent_task_id' => 'required|exists:tasks,id',
            'dependency_task_id' => 'required|exists:tasks,id|different:dependent_task_id',
        ]);

        $taskDependency = TaskDependency::create($request->all());

        return response()->json(['data' => $taskDependency], Response::HTTP_CREATED);
    }

    public function show(TaskDependency $taskDependency)
    {
        return response()->json(['data' => $taskDependency]);
    }

    public function update(Request $request, TaskDependency $taskDependency)
    {
        $request->validate([
            'dependent_task_id' => 'required|exists:tasks,id',
            'dependency_task_id' => 'required|exists:tasks,id|different:dependent_task_id',
        ]);

        $taskDependency->update($request->all());

        return response()->json(['data' => $taskDependency]);
    }

    public function destroy(TaskDependency $taskDependency)
    {
        $taskDependency->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
