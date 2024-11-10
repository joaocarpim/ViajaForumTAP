<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $topicId)
    {
        // Validação do comentário
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Criação do comentário
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->topic_id = $topicId; // Associar ao tópico
        $comment->user_id = auth()->id(); // Usuário autenticado
        $comment->save();

        // Redirecionar de volta para o tópico
        return redirect()->route('topics.listAllTopics');
    }
}
