<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function listAllTags() {
        $tags = Tag::all(); // Obtém todas as tags
        return view('tags.listAllTags', compact('tags'));
    }

    public function createTag() {
        return view('tags.createTag');
    }

    public function storeTag(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Cria a nova tag
        Tag::create($request->all());

        // Redireciona para a lista de tags com uma mensagem de sucesso
        return redirect()->route('listAllTags')->with('message-success', 'Tag criada com sucesso!');
    }

    public function listTagById($id) {
        $tag = Tag::findOrFail($id); // Obtém a tag pelo id
        return view('tags.view_Tag', compact('tag'));
    }

    public function updateTag(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Encontra a tag e atualiza
        $tag = Tag::findOrFail($id);
        $tag->update($request->all());

        // Redireciona para a lista de tags
        return redirect()->route('listAllTags')->with('message-success', 'Tag atualizada com sucesso!');
    }

    public function deleteTag($id) {
        Tag::destroy($id); // Deleta a tag pelo id
        return redirect()->route('listAllTags')->with('message-success', 'Tag excluída com sucesso!');
    }
}
