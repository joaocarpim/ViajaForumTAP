@extends('layouts.header_footer')

@section('content')
    <div class="create-post-container">
        <form action="{{ route('updateTag', ['id' => $tag->id]) }}" method="POST" class="create-post-form">
            <h2 class="create-post-title">Editar Tag</h2>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title" class="form-label">Título da Tag:</label>
                <input type="text" id="title" name="title" class="form-input" value="{{ old('title', $tag->title) }}" required>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <input type="submit" class="submit-button" value="Salvar alterações">
        </form>
    </div>
@endsection
