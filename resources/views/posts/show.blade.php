@extends('layouts.header_footer')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="post">
                <h1>{{ $post->title }}</h1>
                <p class="text-muted">Publicado em {{ $post->created_at->format('d/m/Y H:i') }} por {{ $post->user->name }}</p>

                <p><strong>Categoria:</strong> <a href="{{ route('categoria.show', $post->category->id) }}">{{ $post->category->name }}</a></p>

                <p><strong>Tags:</strong>
                    @foreach ($post->tags as $tag)
                    <span class="badge badge-secondary"><a href="{{ route('tag.show', $tag->id) }}" class="text-white">{{ $tag->name }}</a></span>
                    @endforeach
                </p>

                <div class="content">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <div class="comments-section mt-4">
                    <h3>{{ $post->comments->count() }} Comentários</h3>
                    <ul class="list-group">
                        @foreach ($post->comments as $comment)
                        <li class="list-group-item">
                            <p><strong>{{ $comment->user->name }}</strong> <span class="text-muted">{{ $comment->created_at->format('d/m/Y H:i') }}</span></p>
                            <p>{{ $comment->content }}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mt-4">
                    <h4>Deixe seu comentário</h4>
                    <form action="{{ route('comentario.store', $post->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="4" placeholder="Escreva seu comentário..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar Comentário</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection