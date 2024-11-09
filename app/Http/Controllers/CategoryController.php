<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listAllCategories() {
        $categories = Category::all();
        return view('categories.listAllCategories', ['categories' => $categories]);
    }
    
    public function listCategoryById($idCategory) {  // Altere de $id para $idCategory
        $category = Category::findOrFail($idCategory);  // Altere de $id para $idCategory
        return view('categories.view_categorie', ['category' => $category]);
    }
    
    public function create() {
        return view('categories.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);
    
        Category::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    
        return redirect()->route('listAllCategories')->with('message-success', 'Categoria criada com sucesso!');
    }
    
    public function edit($idCategory) {  // Altere de $id para $idCategory
        $category = Category::findOrFail($idCategory);  // Altere de $id para $idCategory
        return view('categories.view_categorie', ['category' => $category]);
    }
    
    public function updateCategory(Request $request, $idCategory) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);
    
        // Encontra a categoria pelo idCategory
        $category = Category::findOrFail($idCategory);
    
        // Atualiza os campos da categoria
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
    
        // Redireciona para a lista de categorias
        return redirect()->route('listAllCategories')
                         ->with('message-success', 'Categoria atualizada com sucesso!');
    }
    
    
    
    
    
    public function deleteCategory($idCategory) {  // Altere de $id para $idCategory
        Category::destroy($idCategory);  // Altere de $id para $idCategory
        return redirect()->route('listAllCategories')->with('message-success', 'Categoria deletada com sucesso!');
    }
    
}
