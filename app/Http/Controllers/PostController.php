<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    public function listAllPosts()
    {
        $posts = Post::all();
        return view('posts.listAllPosts', ['posts' => $posts]);
    }

    public function createPost()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category,
            'user_id' => auth()->id(),
            'image' => $imagePath,
        ]);

        $post->tags()->sync($request->tags);

        return redirect()->route('listAllPosts')->with('success', 'Post criado com sucesso!');
    }


    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('listAllPosts')->with('error', 'Post não encontrado!');
        }
        return view('posts.show', ['post' => $post]);
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('listAllPosts')->with('error', 'Post não encontrado!');
        }

        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.editPost', compact('post', 'categories', 'tags'));
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
        ]);

        $post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
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

        $post->delete();
        return redirect()->route('listAllPosts')->with('success', 'Post excluído com sucesso!');
    }
}
