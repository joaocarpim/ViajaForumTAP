<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function index() {
        $topics = Topic::all();
        return $topics;
    }

    public function listAllTopics() {
        $topics = Topic::with('comments')->get();  
        return view('topics.listAllTopics', ['topics' => $topics]);
    }

    public function createTopicForm() {
        $categories = Category::all();
        return view('topics.createTopic', ['categories' => $categories]);
    }
    
    public function createTopic(Request $request) {
        // dd('Requisição recebida');  // Remover o dd, pois é apenas para depuração
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'image' => 'nullable|image', // A imagem é opcional
            'category_id' => 'required|exists:categories,id'
        ]);
    
        $topic = Topic::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category_id
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('topics_images', 'public');
            // Aqui você pode armazenar o caminho da imagem ou associar a imagem ao tópico de alguma forma.
        }
    
        return redirect()->route('listAllTopics')->with('message-success', 'Tópico criado com sucesso!');
    }

    public function listTopicById($id) {
        $topic = Topic::with('comments', 'category')->findOrFail($id);
        return view('topics.viewTopic', ['topic' => $topic]);
    }

    public function updateTopic(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|int'
        ]);

        $topic = Topic::findOrFail($id);
        $topic->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('listTopicById', $topic->id)->with('message-success', 'Alteração realizada com sucesso');
    }

    public function deleteTopic($id) {
        $topic = Topic::findOrFail($id);
        $topic->delete();
        return redirect()->route('listAllTopics')->with('message-success', 'Tópico excluído com sucesso!');
    }
}
