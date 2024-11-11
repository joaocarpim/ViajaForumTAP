@extends('layouts.header_footer')

@section('content')
<<<<<<< HEAD
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
            <p><strong>{{ $comment->post->user->name ?? 'Usuário desconhecido' }}</strong> disse:</p>
            <p>{{ $comment->content }}</p>
            <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
        </div>
        @endforeach
    </section>
</div>
@endsection
=======
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
                    <p><strong>{{ $comment->post->user->name ?? 'Usuário desconhecido' }}</strong> disse:</p>
                    <p>{{ $comment->content }}</p>
                    <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        </section>
    </div>
@endsection
>>>>>>> 7b4248e196bf32428f644cf9686827cc2106c383
