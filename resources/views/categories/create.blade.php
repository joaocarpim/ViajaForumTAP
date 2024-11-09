@extends('layouts.header_footer')

@section('content')
<div class="create-category-container">
    <form action="{{ route('categories.store') }}" method="POST" class="create-category-form">
        <h2 class="create-category-title">Criar Nova Categoria</h2>
        @csrf
        <div class="form-group">
            <label for="title">Título da Categoria:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" required>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <input type="text" id="description" name="description" class="form-input" value="{{ old('description') }}" required>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" class="submit-button" value="Criar">
    </form>
</div>
@endsection
