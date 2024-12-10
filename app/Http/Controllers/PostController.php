<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function listAllPosts()
    {
        $posts = Post::with(['topic', 'tags', 'category'])->get();
        return view('posts.listAllPosts', ['posts' => $posts]);
    }

    public function createPost()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $topics = Topic::all(); // Tópicos disponíveis para seleção
        return view('posts.createPost', compact('categories', 'tags', 'topics'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,idCategory',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
            'content' => 'required|string',
            'topic_id' => 'nullable|exists:topics,id', // Validação do tópico selecionado
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('images', 'public') : null;

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'image' => $imagePath,
            'topic_id' => $request->topic_id, // Relacionamento com o tópico
        ]);

        $post->tags()->sync($request->tags);

        return redirect()->route('listAllPosts')->with('success', 'Post criado com sucesso!');
    }

    public function show($id)
    {
        $post = Post::with(['topic.comments.user', 'tags', 'category'])->find($id);

        if (!$post) {
            return redirect()->route('listAllPosts')->with('error', 'Post não encontrado!');
        }

        return view('posts.showPost', ['post' => $post]);
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('listAllPosts')->with('error', 'Post não encontrado!');
        }

        $categories = Category::all();
        $tags = Tag::all();
        $topics = Topic::all(); // Tópicos disponíveis para seleção

        return view('posts.editPost', compact('post', 'categories', 'tags', 'topics'));
    }

    public function updatePost(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('listAllPosts')->with('error', 'Post não encontrado!');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'topic_id' => 'nullable|exists:topics,id', // Validação do tópico
        ]);

        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'topic_id' => $request->topic_id, // Atualizar o tópico relacionado
        ]);

        $post->tags()->sync($request->tags);

        return redirect()->route('posts.show', $post->id)->with('success', 'Post atualizado com sucesso!');
    }

    public function deletePost($id)
{
    $post = Post::find($id);
    if (!$post) {
        return redirect()->route('listAllPosts')->with('error', 'Post não encontrado!');
    }

    
    if ($post->image && Storage::exists('public/' . $post->image)) {
        Storage::delete('public/' . $post->image);
    }

    $post->delete();
    return redirect()->route('listAllPosts')->with('success', 'Post excluído com sucesso!');
}

}
