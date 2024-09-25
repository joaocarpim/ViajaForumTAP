@extends('layouts.app')

@section('content')
<h1>Categorias</h1>
<a href="{{ route('createCategory') }}">Criar Nova Categoria</a>

<ul>
    @foreach($categories as $category)
        <li>
            <a href="{{ route('listCategoryById', $category->id) }}">{{ $category->name }}</a>
            <form action="{{ route('deleteCategory', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Deletar</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
