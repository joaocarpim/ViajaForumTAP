<?php

namespace App\Http\Controllers;

use App\Models\Comment;
<<<<<<< HEAD
=======
use App\Models\Topic;
>>>>>>> 7b4248e196bf32428f644cf9686827cc2106c383
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $topicId)
    {
<<<<<<< HEAD
=======
        // Validação do comentário
>>>>>>> 7b4248e196bf32428f644cf9686827cc2106c383
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

<<<<<<< HEAD
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

=======
        // Criação do comentário
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->topic_id = $topicId; // Associar ao tópico
        $comment->user_id = auth()->id(); // Usuário autenticado
        $comment->save();

        // Redirecionar de volta para o tópico
        return redirect()->route('topics.listAllTopics');
    }
>>>>>>> 7b4248e196bf32428f644cf9686827cc2106c383
}
