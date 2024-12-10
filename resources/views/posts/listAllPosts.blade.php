@extends('layouts.header_footer')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="post">
                    <h1>{{ $post->title }}</h1>
                    <p class="text-muted">Publicado em {{ $post->created_at->format('d/m/Y H:i') }} por {{ $post->user->name }}</p>

                    <p><strong>Categoria:</strong>
                        @if ($post->category)
                            <a href="#">{{ $post->category->title }}</a>
                        @else
                            <span>Categoria não disponível</span>
                        @endif
                    </p>
                    
                    <p><strong>Tópico:</strong>
                        @if ($post->topic)
                            <a href="{{ route('topics.show', $post->topic->id) }}">{{ $post->topic->title }}</a>
                        @else
                            <span>Tópico não relacionado</span>
                        @endif
                    </p>

                    <p><strong>Tags:</strong> 
                        @if ($post->tags->isNotEmpty())
                            @foreach ($post->tags as $tag)
                                <span class="badge bg-primary">{{ $tag->title }}</span> <!-- Alterado de name para title -->
                            @endforeach
                        @else
                            <span>Sem tags</span>
                        @endif
                    </p>
                    
                    <p>{{ \Illuminate\Support\Str::limit($post->content, 200) }}</p>

                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">Ver Mais</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
