<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $topics = Topic::with('category')->get();
        $posts = Post::all();
        $tags = Tag::all();

        return view('welcome', compact('categories', 'topics', 'posts', 'tags'));
    }
}
