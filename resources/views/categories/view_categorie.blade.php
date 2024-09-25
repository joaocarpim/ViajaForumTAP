@extends('layouts.header_footer')

@section('content')
<h1>Categoria: {{ $category->name }}</h1>

<form action="{{ route('updateCategory', $category->id) }}" method="POST">
    @csrf
    <label for="name">Nome:</label>
    <input type="text" name="name" value="{{ $category->name }}" required>
    <button type="submit">Atualizar</button>
</form>

<form action="{{ route('deleteCategory', $category->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar Categoria</button>
</form>
@endsection
