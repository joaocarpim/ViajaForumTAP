@extends('layouts.header_footer')

@section('content')
<div class="container mt-5">
    <header class="mb-4">
        <h1>{{ $topic->title }}</h1>
        <p>Status: {{ $topic->status ? 'Ativo' : 'Inativo' }}</p>
        <p>Categoria: {{ $topic->category->title ?? 'Sem categoria' }}</p>
    </header>

    <section class="topic-details">
        <p>{{ $topic->description }}</p>

        <h3>Comentários</h3>
        @foreach ($topic->comments as $comment)
        <div class="comment mb-3">
            <p><strong>{{ $comment->user->name ?? 'Usuário desconhecido' }}</strong> disse:</p>
            <p>{{ $comment->content }}</p>
            <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
        </div>
        @endforeach
    </section>

    {{-- Formulário para adicionar um novo comentário --}}
    @if(Auth::check())
    <section class="add-comment-form">
        <h4>Adicionar um comentário:</h4>
        <form action="{{ route('comments.store', ['topicId' => $topic->id]) }}" method="POST">

            @csrf
            <textarea name="content" class="form-control" rows="3" placeholder="Escreva seu comentário..."></textarea>
            <button type="submit" class="btn btn-primary mt-2">Comentar</button>
        </form>
    </section>
    @endif
</div>
@endsection