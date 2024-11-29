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
        return view('posts.createPost', compact('categories', 'tags'));  // Alterado para 'createPost'
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'title' => 'required|string|max:255', // Título obrigatório e com tamanho máximo
            'category_id' => 'required|exists:categories,id', // Corrigido: 'category' para 'category_id'
            'tags' => 'required|array', // As tags devem ser um array
            'tags.*' => 'exists:tags,id', // Cada tag deve existir no banco
            'content' => 'required|string', // Conteúdo obrigatório
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Imagem opcional, mas se fornecida, deve ser do tipo imagem
        ]);
    
        // Verifica se o usuário carregou uma imagem
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Armazena a imagem
        } else {
            $imagePath = null; // Caso não haja imagem, mantém o valor nulo
        }
    
        // Cria o post com os dados fornecidos
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,  // 'category' corrigido para 'category_id'
            'user_id' => auth()->id(),  // Associa o post ao usuário autenticado
            'image' => $imagePath, // Se houver imagem, armazena o caminho
        ]);
    
        // Associa as tags selecionadas ao post
        $post->tags()->sync($request->tags);
    
        // Redireciona para a lista de posts com uma mensagem de sucesso
        return redirect()->route('listAllPosts')->with('success', 'Post criado com sucesso!');
    }
    

    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('listAllPosts')->with('error', 'Post não encontrado!');
        }
        return view('posts.showPost', ['post' => $post]);  // Alterado para 'showPost'
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('listAllPosts')->with('error', 'Post não encontrado!');
        }

        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.editPost', compact('post', 'categories', 'tags'));  // Alterado para 'editPost'
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
