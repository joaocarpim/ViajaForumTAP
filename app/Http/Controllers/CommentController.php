<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Topic;
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

        return redirect()->route('topics.show', ['topic' => $topicId])->with('success', 'Comentário adicionado com sucesso!');
    }

    public function destroy($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if ($comment->user_id != auth()->id()) {
            return redirect()->back()->with('error', 'Você não tem permissão para excluir este comentário.');
        }

        $comment->delete();

        return redirect()->route('topics.show', ['topic' => $comment->topic_id])->with('success', 'Comentário excluído com sucesso!');
    }
}
