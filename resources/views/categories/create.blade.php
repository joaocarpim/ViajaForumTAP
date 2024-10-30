@extends('layouts.header_footer')

@section('content')
<header>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
    </style>
</header>

<div class="create-category-container">
    <form action="{{ route('categories.store') }}" method="POST" class="create-category-form">
        <h2 class="create-category-title" style="color: #000000;">Criar Nova Categoria</h2>
        @csrf
        <div class="form-group">
            <label for="title" class="form-label" style="color: #000000;">Título da Categoria:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" required>
            @error('title')
                <span class="text-danger" style="color: #000000;">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="description" class="form-label" style="color: #000000;">Descrição:</label>
            <input type="text" id="description" name="description" class="form-input" value="{{ old('description') }}" required>
            @error('description')
                <span class="text-danger" style="color: #000000;">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" class="submit-button" value="Criar">
    </form>
</div>
@endsection
