@extends('layouts.header_footer')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Comentários do Tópico: {{ $topic->title }}</h3>
        </div>

        <div class="comments-section">
            <h5>Comentários:</h5>

            @foreach ($comments as $comment)
                <div class="comment">
                    <p class="user-name">{{ $comment->user->name ?? 'Usuário desconhecido' }} disse:</p>
                    <p>{{ $comment->content }}</p>
                    <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        </div>

        <div class="add-comment-form">
            <form action="{{ route('comments.store', ['topicId' => $topic->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="content" class="form-control" rows="2" placeholder="Adicionar um comentário" required></textarea>
                </div>
                <button type="submit" class="btn">Comentar</button>
            </form>
        </div>
    </div>
</div>
@endsection
