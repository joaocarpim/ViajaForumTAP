@extends('layouts.header_footer')

@section('content')
<header>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        .submit-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #45a049;
        }

        .create-post-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
        }

        .create-post-title {
            font-size: 24px;
            font-weight: 500;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .form-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: black;
        }

        .form-input:focus {
            border-color: #4CAF50;
            outline: none;
        }

        select {
            color: black;
            background-color: white;
        }

        .text-danger {
            color: red;
            font-size: 14px;
        }
    </style>

    <div class="create-post-container">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <h1 class="create-post-title">Criar Novo Post</h1>

            <!-- Campo de Título -->
            <div class="form-group">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-input" value="{{ old('title') }}" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de Categoria -->
            <div class="form-group">
                <label for="category_id" class="form-label">Categoria</label>
                <select name="category_id" id="category_id" class="form-input" required>
    @foreach ($categories as $category)
        <option value="{{ $category->idCategory }}" {{ old('category_id') == $category->idCategory ? 'selected' : '' }}>
            {{ $category->title }}
        </option>
    @endforeach
</select>

                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de Tags -->
            <div class="form-group">
                <label for="tags" class="form-label">Tags</label>
                <select name="tags[]" id="tags" class="form-input" multiple required>
    @foreach ($tags as $tag)
        <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
            {{ $tag->name }}
        </option>
    @endforeach
</select>

                @error('tags')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de Conteúdo -->
            <div class="form-group">
                <label for="content" class="form-label">Conteúdo</label>
                <textarea name="content" id="content" class="form-input" rows="5" required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de Imagem -->
            <div class="form-group">
                <label for="image" class="form-label">Imagem (Opcional)</label>
                <input type="file" name="image" id="image" class="form-input">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="submit-button">Criar Post</button>
            </div>
        </form>
    </div>
</header>
@endsection
