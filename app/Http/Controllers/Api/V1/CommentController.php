<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return response()->json(['data' => $comments]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'comment' => 'required|string',
        ]);

        $comment = Comment::create($request->all());

        return response()->json(['data' => $comment], Response::HTTP_CREATED);
    }

    public function show(Comment $comment)
    {
        return response()->json(['data' => $comment]);
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'comment' => 'required|string',
        ]);

        $comment->update($request->all());

        return response()->json(['data' => $comment]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
