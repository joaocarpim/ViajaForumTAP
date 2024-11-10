<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TopicController extends Controller
{
    // Exibe todos os tópicos com seus comentários
    public function listAllTopics()
    {
        $topics = Topic::with('comments')->get();
        return view('topics.listAllTopics', ['topics' => $topics]);
    }

    // Exibe o formulário para criação de um novo tópico
    public function createTopicForm()
    {
        $categories = Category::all();
        return view('topics.createTopic', ['categories' => $categories]);
    }

    // Processa a criação de um novo tópico
    public function storeTopic(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'image' => 'nullable|image|max:2048', // Máximo de 2MB
            'category_id' => 'required|exists:categories,idCategory',
        ]);

        // Dados do tópico
        $topicData = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ];

        // Verifica se há uma imagem e faz o upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Armazenar na pasta 'images'
            $topicData['image'] = $imagePath; // Salvar o caminho da imagem no banco
        }

        // Cria o novo tópico
        $topic = Topic::create($topicData);
        
        // Redireciona para a lista de tópicos
        return redirect()->route('topics.listAllTopics');
    }

    // Exibe o formulário para editar um tópico
    public function editTopicForm($id)
    {
        // Recupera o tópico e as categorias
        $topic = Topic::findOrFail($id);
        $categories = Category::all();

        return view('topics.editTopic', ['topic' => $topic, 'categories' => $categories]);
    }

    // Atualiza um tópico no banco
    public function updateTopic(Request $request, $id)
    {
        // Validação dos dados do formulário
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'image' => 'nullable|image|max:2048', // Máximo de 2MB
            'category_id' => 'required|exists:categories,idCategory',
        ]);

        // Recupera o tópico
        $topic = Topic::findOrFail($id);

        // Dados atualizados do tópico
        $topicData = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ];

        // Verifica se há uma nova imagem
        if ($request->hasFile('image')) {
            // Exclui a imagem anterior, se houver
            if ($topic->image) {
                Storage::delete('public/' . $topic->image); // Exclui a imagem antiga
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $topicData['image'] = $imagePath;
        }

        // Atualiza o tópico
        $topic->update($topicData);

        // Redireciona para a lista de tópicos
        return redirect()->route('topics.listAllTopics');
    }

    // Exclui um tópico
    public function deleteTopic($id)
    {
        // Recupera o tópico
        $topic = Topic::findOrFail($id);

        // Verifica se o tópico tem uma imagem associada e exclui
        if ($topic->image) {
            Storage::delete('public/' . $topic->image);
        }

        // Exclui o tópico
        $topic->delete();

        // Redireciona para a lista de tópicos
        return redirect()->route('topics.listAllTopics');
    }
    public function showTopic($id)
{
    $topic = Topic::with('comments')->findOrFail($id);
    return view('topics.showTopic', compact('topic'));
}

}
