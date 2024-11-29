@extends('layouts.header_footer')

@section('content')
<header>
    <h1>{{ $post->title }}</h1>
    <div class="post-info">
        <span>Publicado por {{ $post->user->name }} em {{ $post->created_at->format('d/m/Y H:i') }}</span>
    </div>
    <div class="post-content">
        <p>{{ $post->content }}</p>
    </div>

    <h2>Comentários</h2>
    @foreach ($post->comments as $comment)
        <div class="comment">
            <strong>{{ $comment->user->name }}</strong> ({{ $comment->created_at->format('d/m/Y H:i') }}):
            <p>{{ $comment->content }}</p>
        </div>
    @endforeach

    <h2>Adicionar Comentário</h2>
    <form action="{{ route('comentario.store') }}" method="POST">
        @csrf
        <textarea name="content" class="form-input" required></textarea>
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <button type="submit" class="submit-button">Adicionar Comentário</button>
    </form>
</header>
@endsection
