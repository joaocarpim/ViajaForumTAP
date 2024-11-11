@extends('layouts.header_footer')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <!-- Exibindo o Post -->
            @foreach($posts as $post)
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

                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Ver Post</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection