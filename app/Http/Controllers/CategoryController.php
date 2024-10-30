<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listAllCategories() {
        $categories = Category::all(); // Busca todas as categorias
        return view('categories.listAllCategories', ['categories' => $categories]);
    }

    public function listCategoryById($id) {
        $category = Category::findOrFail($id); // Busca uma categoria pelo ID
        return view('categories.profile', ['category' => $category]);
    }

    public function register(Request $request) {
        if ($request->isMethod('GET')) {
            return view('categories.create'); // Retornar a view 'create' (ou use 'categories.createCategories' se mantiver o nome)
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            Category::create([
                'name' => $request->name,
            ]);

            return redirect()->route('listAllCategories')->with('message-success', 'Categoria criada com sucesso!');
        }
    }

    public function updateCategory(Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('listCategoryById', [$category->id])->with('message-success', 'Alteração realizada com sucesso');
    }

    public function deleteCategory($id) {
        Category::destroy($id);
        return redirect()->route('listAllCategories')->with('message-success', 'Categoria deletada com sucesso!');
    }
}
