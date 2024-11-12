@extends('layouts.header_footer')

@section('content')
<header>
    <style>
        /* Aqui você pode adicionar seu CSS */
    </style>
</header>

<div class="create-post-container">
<form action="{{ route('storeTag') }}" method="POST" class="create-post-form">
        <h2 class="create-post-title">Crie sua Tag!</h2>
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Título da Tag:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" required>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" class="submit-button" value="Criar Tag">
    </form>
</div>
@endsection
