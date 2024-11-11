<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TopicController extends Controller
{
    public function listAllTopics()
    {
        $topics = Topic::with('comments')->get();
        return view('topics.listAllTopics', ['topics' => $topics]);
    }

    public function createTopicForm()
    {
        $categories = Category::all();
        return view('topics.createTopic', ['categories' => $categories]);
    }

    public function storeTopic(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'image' => 'nullable|image|max:2048', 
            'category_id' => 'required|exists:categories,idCategory',
        ]);

        $topicData = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Armazenar na pasta 'images'
            $topicData['image'] = $imagePath; 
        }

        $topic = Topic::create($topicData);

        return redirect()->route('topics.listAllTopics');
    }

    public function editTopicForm($id)
    {
        $topic = Topic::findOrFail($id);
        $categories = Category::all();

        return view('topics.editTopic', ['topic' => $topic, 'categories' => $categories]);
    }

    public function updateTopic(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'image' => 'nullable|image|max:2048', 
            'category_id' => 'required|exists:categories,idCategory',
        ]);
        $topic = Topic::findOrFail($id);

        $topicData = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category_id,
        ];

        if ($request->hasFile('image')) {
            if ($topic->image) {
                Storage::delete('public/' . $topic->image); // Exclui a imagem antiga
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $topicData['image'] = $imagePath;
        }
        $topic->update($topicData);

        return redirect()->route('topics.listAllTopics');
    }

    public function deleteTopic($id)
    {
        $topic = Topic::findOrFail($id);

        if ($topic->image) {
            Storage::delete('public/' . $topic->image);
        }
        $topic->delete();

        return redirect()->route('topics.listAllTopics');
    }
    public function showTopic($id)
    {
        $topic = Topic::with('comments')->findOrFail($id);
        return view('topics.showTopic', compact('topic'));
    }
}
