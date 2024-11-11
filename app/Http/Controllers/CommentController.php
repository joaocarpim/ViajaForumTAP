<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $topicId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para comentar.');
        }

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->topic_id = $topicId;
        $comment->user_id = auth()->id(); 
        $comment->save();

        return redirect()->route('topics.listAllTopics');
    }

}
