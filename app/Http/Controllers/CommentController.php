<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index() {
        $comments = Comment::with('author')->orderByDesc('id')->get();

        return response($comments, 200);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'body' => 'required|string'
        ]);
        
        $comment = auth()->user()->comments()->create($data);

        $comment->load('author');

        return response($comment, 200);
    }

    public function update(Request $request, Comment $comment) {
        $data = $request->validate([
            'body' => 'required|string'
        ]);
        
        $comment->body = $data['body'];
        
        $comment->save();
        
        $comment->load('author');

        return response($comment, 200);
    }

    public function destroy(Comment $comment){
        $comment->delete();

        return response(null, 204);
    }
}
