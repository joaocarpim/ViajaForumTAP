@extends('layouts.header_footer')

@section('content')
<header>
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
                            {{ $tag->title }}
                        </option>
                    @endforeach
                </select>
                @error('tags')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de Seleção de Tópico -->
            <div class="form-group">
                <label for="topic_id" class="form-label">Tópico (Opcional)</label>
                <select name="topic_id" id="topic_id" class="form-input">
                    <option value="">Selecione um tópico</option>
                    @foreach ($topics as $topic)
                        <option value="{{ $topic->id }}" {{ old('topic_id') == $topic->id ? 'selected' : '' }}>
                            {{ $topic->title }}
                        </option>
                    @endforeach
                </select>
                @error('topic_id')
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
