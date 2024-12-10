<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function listAllTopics()
    {
        $topics = Topic::with('comments', 'tags', 'category')->get();
        return view('topics.listAllTopics', ['topics' => $topics]);
    }

    public function createTopicForm()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('topics.createTopic', ['categories' => $categories, 'tags' => $tags]);
    }

    public function storeTopic(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:categories,idCategory',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $topic = Topic::create($request->only(['title', 'description', 'status', 'category_id']));

        if ($request->has('tags')) {
            $topic->tags()->sync($request->tags);
        }

        return redirect()->route('topics.listAllTopics');
    }

    public function editTopicForm($id)
    {
        $topic = Topic::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('topics.editTopic', compact('topic', 'categories', 'tags'));
    }

    public function updateTopic(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:categories,idCategory',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $topic = Topic::findOrFail($id);
        $topic->update($request->only(['title', 'description', 'status', 'category_id']));

        if ($request->has('tags')) {
            $topic->tags()->sync($request->tags);
        }

        return redirect()->route('topics.show', ['id' => $topic->id]);
    }

    public function deleteTopic($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();
        return redirect()->route('topics.listAllTopics');
    }

    public function show($id)
    {
        $topic = Topic::with('tags', 'category', 'posts')->findOrFail($id);
        return view('topics.showTopic', compact('topic'));

    }

    public function suspend($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->update(['status' => 0]);

        return back()->with('message', 'Tópico suspenso com sucesso!');
    }

    public function listPostsByTopic($id)
    {
        $topic = Topic::with('posts')->findOrFail($id);
        return view('topics.listPostsByTopic', compact('topic'));
    }
}
