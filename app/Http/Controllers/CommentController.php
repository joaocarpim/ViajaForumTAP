<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Ver todos os comentários de um tópico
    public function index($topicId)
    {
        // Buscar o tópico e seus comentários
        $topic = Topic::findOrFail($topicId);
        $comments = Comment::where('topic_id', $topicId)->get();
        
        // Retorna a view passando o tópico e os comentários
        return view('comments.index', compact('topic', 'comments'));
    }

    // Ver um comentário único
    public function show($topicId, $id)
    {
        // Buscar o comentário pelo ID
        $comment = Comment::findOrFail($id);
        
        // Retorna a view com o comentário
        return view('comments.show', compact('comment'));
    }

    // Formulário de criação de comentário
    public function create($topicId)
    {
        // Buscar o tópico para associar o comentário
        $topic = Topic::findOrFail($topicId);
        
        // Retorna a view de criação do comentário, passando o tópico
        return view('comments.create', compact('topic'));
    }

    // Salvar novo comentário
    public function store(Request $request, $topicId)
    {
        // Validar os dados do comentário
        $request->validate([
            'content' => 'required', // Conteúdo do comentário é obrigatório
        ]);
    
        // Criar o comentário, associando ao tópico e ao usuário autenticado
        Comment::create([
            'content' => $request->content,
            'topic_id' => $topicId,
            'user_id' => auth()->id(), // Associar ao usuário autenticado
        ]);
    
        // Redirecionar para a lista de comentários do tópico
        return redirect()->route('comments.index', ['topicId' => $topicId]);
    }

    // Exibir formulário de edição de comentário
    public function edit($topicId, $id)
    {
        // Buscar o comentário a ser editado
        $comment = Comment::findOrFail($id);
        
        // Retorna a view de edição de comentário, passando o comentário e o ID do tópico
        return view('comments.edit', compact('comment', 'topicId'));
    }

    // Atualizar comentário
    public function update(Request $request, $topicId, $id)
    {
        // Validar os dados do comentário
        $request->validate([
            'content' => 'required', // Conteúdo do comentário é obrigatório
        ]);

        // Buscar o comentário pelo ID
        $comment = Comment::findOrFail($id);
        
        // Atualizar o conteúdo do comentário
        $comment->update($request->only('content'));

        // Redirecionar para a página do comentário atualizado
        return redirect()->route('comments.show', ['topicId' => $topicId, 'id' => $id]);
    }

    // Excluir comentário
    public function destroy($topicId, $id)
    {
        // Buscar o comentário a ser excluído
        $comment = Comment::findOrFail($id);
        
        // Excluir o comentário
        $comment->delete();

        // Redirecionar para a lista de comentários do tópico
        return redirect()->route('comments.index', ['topicId' => $topicId]);
    }
}
