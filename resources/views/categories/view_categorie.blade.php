@extends('layouts.header_footer')

@section('content')
    <div class="create-category-container">
        <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST" class="create-category-form">
            <h2 class="create-category-title">Editar Categoria</h2>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title" class="form-label">Título da Categoria:</label>
                <input type="text" id="title" name="title" class="form-input" value="{{ old('title', $category->title) }}" required>
                @error('title')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Descrição:</label>
                <input type="text" id="description" name="description" class="form-input" value="{{ old('description', $category->description) }}" required>
                @error('description')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="row">
                <input type="submit" class="btn btn-edit" value="Salvar">
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa-solid fa-ban"></i> Excluir Categoria</a>
            </div>
        </form>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Excluir Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Você tem certeza que deseja excluir essa Categoria?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="w-50">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Confirmar">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
