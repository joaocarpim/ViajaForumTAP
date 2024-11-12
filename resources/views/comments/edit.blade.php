@extends('layouts.header_footer')

@section('content')
<div class="container mt-5">
    <header class="mb-4">
        <h1>Editar Comentário</h1>
    </header>

    <form action="{{ route('comments.update', ['topicId' => $topicId, 'id' => $comment->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="content">Conteúdo do Comentário</label>
            <textarea name="content" class="form-control" rows="4" placeholder="Edite o seu comentário">{{ old('content', $comment->content) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Salvar Alterações</button>
    </form>
</div>
@endsection
