@extends('layouts.header_footer')

@section('content')
<div class="create-post-container">
    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="create-post-form">
        @csrf
        @method('PUT')

        <h2 class="create-post-title">Editar Post</h2>

        <div class="form-group">
            <label for="title" class="form-label">Título do Post:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title', $post->title) }}" required>
            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="category_id" class="form-label">Categoria:</label>
            <select name="category_id" id="category_id" class="form-input">
                @foreach ($categories as $category)
                    <option value="{{ $category->idCategory }}" {{ $post->category_id == $category->idCategory ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
            @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="tags" class="form-label">Tags:</label>
            <select name="tags[]" id="tags" class="form-input" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $tag->title }}
                    </option>
                @endforeach
            </select>
            @error('tags')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

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

        <div class="form-group">
            <label for="content" class="form-label">Conteúdo:</label>
            <textarea name="content" id="content" class="form-input" rows="5" required>{{ old('content', $post->content) }}</textarea>
            @error('content')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <button type="submit" class="submit-button">Atualizar Post</button>
        </div>
    </form>
</div>
@endsection
