<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    // Método para listar todos os tópicos
    public function listAllTopics()
    {
        $topics = Topic::with('comments', 'tags', 'category')->get();  // Carrega comentários, tags e categoria associada
        return view('topics.listAllTopics', ['topics' => $topics]);
    }

    // Método para mostrar o formulário de criação de um tópico
    public function createTopicForm()
    {
        $categories = Category::all();
        $tags = Tag::all(); // Carrega todas as tags
        return view('topics.createTopic', ['categories' => $categories, 'tags' => $tags]);
    }

    // Método para armazenar um novo tópico
    public function storeTopic(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:categories,idCategory',
            'tags' => 'nullable|array', // Validação para tags
            'tags.*' => 'exists:tags,id', // Valida se as tags são válidas
        ]);

        $topicData = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ];

        $topic = Topic::create($topicData);

        // Associa as tags ao tópico, se existirem
        if ($request->has('tags')) {
            $topic->tags()->sync($request->tags); // Associa as tags selecionadas ao tópico
        }

        return redirect()->route('topics.listAllTopics');
    }

    // Método para mostrar o formulário de edição de um tópico
    public function editTopicForm($id)
    {
        $topic = Topic::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all(); // Carrega todas as tags
        return view('topics.editTopic', ['topic' => $topic, 'categories' => $categories, 'tags' => $tags]);
    }

    // Método para atualizar um tópico
    public function updateTopic(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:categories,idCategory',
            'tags' => 'nullable|array', // Validação para tags
            'tags.*' => 'exists:tags,id', // Valida se as tags são válidas
        ]);

        $topic = Topic::findOrFail($id);

        $topicData = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ];

        $topic->update($topicData);

        // Atualiza as tags associadas ao tópico
        if ($request->has('tags')) {
            $topic->tags()->sync($request->tags); // Atualiza as tags
        }

        return redirect()->route('topics.listAllTopics');
    }

    // Método para excluir um tópico
    public function deleteTopic($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();

        return redirect()->route('topics.listAllTopics');
    }

    // Método para exibir um tópico específico
    public function showTopic($id)
    {
        $topic = Topic::with('category', 'comments.user', 'tags')->findOrFail($id); // Carrega o tópico com categoria, comentários e tags
        return view('topics.showTopic', compact('topic'));
    }

    // Método para listar os posts de um tópico
    public function listPostsByTopic($id)
    {
        $topic = Topic::with('posts')->findOrFail($id);
        return view('topics.listPostsByTopic', ['topic' => $topic]);
    }

    // Método para criar um post dentro de um tópico
    public function createPostForm($id)
    {
        $topic = Topic::findOrFail($id);
        return view('posts.createPost', ['topic' => $topic]);
    }

    // Método para armazenar um post dentro de um tópico
    public function storePost(Request $request, $topicId)
    {
        $request->validate([
            'content' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $post = new Post([
            'content' => $request->content,
            'status' => $request->status,
            'topic_id' => $topicId,
        ]);

        $post->save();

        return redirect()->route('topics.showTopic', ['id' => $topicId]);
    }
}
