@extends('layouts.header_footer')

@section('content')
<div class="container mt-5">
    <header class="mb-4">
        <h1>Lista de Tópicos</h1>
    </header>

<<<<<<< HEAD
    <!-- Verificar se existem tópicos -->
    @if ($topics->isEmpty())
    <div class="custom-alert-div">
        <div class="alert custom-alert">
            <i class="fa-solid fa-exclamation-circle"></i>
            Não há tópicos disponíveis.
        </div>
=======
        <!-- Verificar se existem tópicos -->
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
                        </div>
                        <footer class="card-footer">
                            <!-- Comentários -->
                            <div class="comments-section">
                                <h6>Comentários:</h6>
                                @foreach ($topic->comments as $comment)
                                    <div class="comment mb-3">
                                        <p><strong>{{ $comment->post->user->name ?? 'Usuário desconhecido' }}</strong> disse:</p>
                                        <p>{{ $comment->content }}</p>
                                        <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                    </div>
                                @endforeach
                            </div>

                            <div class="add-comment-form">
                                <form action="{{ route('createComment', ['topicId' => $topic->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="content" class="form-control" rows="2" placeholder="Adicionar um comentário"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-2">Comentar</button>
                                </form>
                            </div>

                            <!-- Botões de Editar e Excluir -->
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
>>>>>>> 7b4248e196bf32428f644cf9686827cc2106c383
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
            </div>
            <footer class="card-footer">
                <!-- Comentários -->
                <div class="comments-section">
                    <h6>Comentários:</h6>
                    @foreach ($topic->comments as $comment)
                    <div class="comment mb-3">
                        <p><strong>{{ $comment->post->user->name ?? 'Usuário desconhecido' }}</strong> disse:</p>
                        <p>{{ $comment->content }}</p>
                        <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                    @endforeach
                </div>

                <div class="add-comment-form">
                    <form action="{{ route('createComment', ['topicId' => $topic->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="2" placeholder="Adicionar um comentário"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Comentar</button>
                    </form>
                </div>

                <!-- Botões de Editar e Excluir -->
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