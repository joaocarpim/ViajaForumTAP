@extends('layouts.header_footer')

@section('content')
<header>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
        
    </style>
</header>

<div class="create-post-container">
    <form action="{{ route('register') }}" method="POST" class="create-post-form" >
        <h2 class="create-post-title" style="color: #000000;">Crie seu Tópico!</h2>
        @csrf
        <div class="form-group">
            <label for="title" class="form-label" style="color: #000000;">Título do Tópico:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" required>
            @error('title')
                <span class="text-danger" style="color: #000000;">{{ $message }}</span>
            @enderror
        </div>
        <input type="submit" class="submit-button" value="Enviar">
    </form>
</div>
@endsection
