@extends('layouts.header_footer')

@section('content')
<div class="container mt-5">
    <h1>Comentário</h1>
    <p><strong>{{ $comment->user->name ?? 'Usuário desconhecido' }}</strong> disse:</p>
    <p>{{ $comment->content }}</p>
    <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
</div>
@endsection
