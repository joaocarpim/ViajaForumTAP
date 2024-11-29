@extends('layouts.header_footer')

@section('content')
<div class="container mx-auto py-8">

    <header class="mb-6">
        <h1 class="text-3xl font-bold">{{ $topic->title }}</h1>
        <p class="text-lg">{{ $topic->description }}</p>
    </header>

    @if($topic->tags->isNotEmpty())
    <section class="mb-6">
        <h2 class="text-2xl font-semibold">Tags</h2>
        <ul class="space-x-2">
            @foreach($topic->tags as $tag)
                <li class="inline-block px-3 py-1 bg-blue-500 text-white rounded">{{ $tag->name }}</li>
            @endforeach
        </ul>
    </section>
    @endif

    <section class="mb-6">
        <h2 class="text-2xl font-semibold">Comentários</h2>

        @if($topic->comments->isEmpty())
        <p class="text-gray-500">Não tem comentários ainda.</p>
        @else
        <ul class="space-y-4">
            @foreach($topic->comments as $comment)
            <li class="p-4 border rounded shadow-sm">
                <p><strong>{{ $comment->user->name ?? 'Unknown User' }}</strong> disse:</p>
                <p>{{ $comment->content }}</p>
                <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
            </li>
            @endforeach
        </ul>
        @endif
    </section>

    @if(auth()->check())
    <section class="mb-6">
        <h2 class="text-2xl font-semibold">Adicione um comentário</h2>
        <form action="{{ route('createComment', ['topicId' => $topic->id]) }}" method="POST" class="mt-3">
            @csrf
            <div class="form-group">
                <textarea name="content" class="w-full p-2 border rounded-md" rows="2" placeholder="Add a comment"></textarea>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded mt-2">Comentar</button>
        </form>
    </section>
    @endif

    @if(auth()->check() && auth()->user()->id === $topic->user_id)
    <section class="mb-6">
        <h2 class="text-2xl font-semibold">Ações</h2>
        <a href="{{ route('topics.edit', $topic->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>
        <form action="{{ route('topics.destroy', $topic->id) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Deletar</button>
        </form>
    </section>
    @endif

</div>
@endsection
