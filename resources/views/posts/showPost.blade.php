@extends('layouts.header_footer')

@section('content')
<div class="post-container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    @if ($post->image)
    <img src="{{ asset('storage/' . $post->image) }}" alt="Imagem do post">
@endif


    <h2>Comentários do Tópico Relacionado</h2>
    @if ($post->topic && $post->topic->comments->isNotEmpty())
        @foreach ($post->topic->comments as $comment)
            <div class="comment">
                <strong>{{ $comment->user->name }}</strong> ({{ $comment->created_at->format('d/m/Y H:i') }}):
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach
    @else
        <p>Este tópico ainda não tem comentários.</p>
    @endif
</div>
@endsection
