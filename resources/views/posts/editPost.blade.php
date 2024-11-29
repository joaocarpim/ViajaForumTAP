@extends('layouts.header_footer')

@section('content')
<div class="create-post-container">
    <form action="{{ route('updatePost', $post->id) }}" method="POST" class="create-post-form">
        @csrf
        @method('PUT')

        <h2 class="create-post-title">Editar Post</h2>

        <div class="form-group">
            <label for="title" class="form-label">Título do Post:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title', $post->title) }}" required>
            @error('title') <span>{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="category" class="form-label">Categoria do Post:</label>
            <select id="category" name="category" class="form-input" required>
                <option value="">Selecione uma categoria</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category', $post->category_id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category') <span>{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="tags" class="form-label">Tags do Post:</label>
            <select id="tags" name="tags[]" class="form-input" multiple required>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            @error('tags') <span>{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="text" class="form-label">Texto do Post:</label>
            <textarea id="text" name="text" class="form-input" required>{{ old('text', $post->content) }}</textarea>
            @error('text') <span>{{ $message }}</span> @enderror
        </div>

        <div class="row">
            <input type="submit" class="btn btn-edit" value="Atualizar">
            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="fa-solid fa-ban"></i> Excluir Post
            </a>
        </div>
    </form>
</div>

<!-- Modal de confirmação de exclusão -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Excluir Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Você tem certeza que deseja excluir este post?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('deletePost', ['id' => $post->id]) }}" method="POST" class="w-50">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Confirmar Excluir">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
