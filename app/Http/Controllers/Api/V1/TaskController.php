<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response()->json(['data' => $tasks]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = Task::create($request->all());

        return response()->json(['data' => $task], Response::HTTP_CREATED);
    }

    public function show(Task $task)
    {
        return response()->json(['data' => $task]);
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update($request->all());

        return response()->json(['data' => $task]);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
