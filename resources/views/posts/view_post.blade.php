@extends('layouts.header_footer')

@section('content')
    <div class="create-post-container">

        <form action="{{ route('register') }}" method="POST" class="create-post-form">
            <h2 class="create-post-title">Editar Post de Viagem</h2>
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Título do Post:</label>
                <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" required>
                @error('title')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="category" class="form-label">Categoria do Post:</label>
                <select id="category" name="category" class="form-input" required>
                    <option value="">Selecione uma categoria</option>
                    <option value="aventuras">Aventuras</option>
                    <option value="culturahistoria">Cultura e História</option>
                    <option value="praia">Destinos de Praia</option>
                    <option value="montanha">Destinos de Montanha</option>
                    <option value="exotico">Destinos Exóticos</option>
                </select>
                @error('category')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tag" class="form-label">Tags do Post:</label>
                <select id="tag" name="tag" class="form-input" required>
                    <option value="">Selecione tags</option>
                    <option value="aventura">#Aventura</option>
                    <option value="cultura">#Cultura</option>
                    <option value="praia">#Praia</option>
                    <option value="montanha">#Montanha</option>
                    <option value="exotico">#Exótico</option>
                </select>
                @error('tag')
                    <span>{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group">
                <label for="text" class="form-label">Texto do Post:</label>
                <textarea id="text" name="text" class="form-input" required>{{ old('text') }}</textarea>
                @error('text')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="row">
                <input type="submit" class="btn btn-edit" value="Editar">
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa-solid fa-ban"></i>
                    Excluir Post</a>
            </div>
        </form>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Excluir Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Você tem certeza que deseja excluir esse Post?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('deletePost', ['id' => $post->id]) }}" method="POST" class="w-50">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value=" Confirmar">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
