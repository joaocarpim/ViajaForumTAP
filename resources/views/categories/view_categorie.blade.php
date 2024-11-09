@extends('layouts.header_footer')

@section('content')
<div class="create-category-container">
<form action="{{ route('updateCategory', ['idCategory' => $category->idCategory]) }}" method="POST" class="create-category-form">
        <h2 class="create-category-title">Editar Categoria</h2>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título da Categoria:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title', $category->title) }}" required>
            @error('title')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <input type="text" id="description" name="description" class="form-input" value="{{ old('description', $category->description) }}" required>
            @error('description')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" class="btn btn-edit" value="Salvar">
    </form>
</div>
@endsection
