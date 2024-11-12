@extends('layouts.header_footer')

@section('content')
<div class="container mt-5">
    <header class="mb-4">
        <h1>Lista de Tópicos</h1>
    </header>

    @if ($topics->isEmpty())
    <div class="custom-alert-div">
        <div class="alert custom-alert">
            <i class="fa-solid fa-exclamation-circle"></i>
            Não há tópicos disponíveis.
        </div>
    </div>
    @else
    <section class="topics-list">
        @foreach ($topics as $topic)
        <article class="card mb-3">
            <header class="card-header">
                <h5>{{ $topic->title }}</h5>
            </header>
            <div class="card-body">
                <p>{{ $topic->description }}</p>
                <p>Status: {{ $topic->status ? 'Ativo' : 'Inativo' }}</p>
                <p>Categoria: {{ $topic->category->title ?? 'Sem categoria' }}</p>
                <a href="{{ route('listTopicById', $topic->id) }}" class="btn btn-primary">Ver Tópico</a>

                <a href="{{ route('comments.index', ['topicId' => $topic->id]) }}" class="btn btn-primary mt-2">Ver Comentários</a>
            </div>
            <footer class="card-footer">
                <div class="comments-section">
                    <h6>Comentários:</h6>
                    @foreach ($topic->comments as $comment)
                    <div class="comment mb-3">
                        <p><strong>{{ $comment->user->name ?? 'Usuário desconhecido' }}</strong> disse:</p>
                        <p>{{ $comment->content }}</p>
                        <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>

                        <!-- Botões de editar e excluir, somente se o usuário for o dono do comentário ou um administrador -->
                        @if(auth()->check() && (auth()->id() === $comment->user_id || auth()->user()->is_admin))
                        <div class="d-flex justify-content-between mt-2">
                            <!-- Botão de Editar -->
                            <a href="{{ route('comments.edit', ['topicId' => $topic->id, 'id' => $comment->id]) }}" class="btn btn-warning btn-sm">Editar</a>

                            <!-- Botão de Excluir -->
                            <form action="{{ route('comments.destroy', ['topicId' => $topic->id, 'id' => $comment->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>

                <div class="add-comment-form">
                    <form action="{{ route('comments.store', ['topicId' => $topic->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="2" placeholder="Adicionar um comentário"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Comentar</button>
                    </form>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('topics.delete', $topic->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </footer>
        </article>
        @endforeach
    </section>
    @endif
</div>
@endsection
