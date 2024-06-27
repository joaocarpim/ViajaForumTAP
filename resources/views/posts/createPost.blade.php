@extends('layouts.header_footer')

@section('content')
<div class="create-post-container">
    
    <form action="{{ route('register') }}" method="POST" class="create-post-form">
        <h2 class="create-post-title">Crie seu Post de Viagem!</h2>
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Título da Viagem:</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old("title") }}" required>
            @error("title") <span>{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="category" class="form-label">Tipo de Viagem:</label>
            <select id="category" name="category" class="form-input" required>
                <option value="">Selecione o tipo de viagem</option>
                <option value="aventura">Aventura</option>
                <option value="cultural">Cultural</option>
                <option value="praia">Praia</option>
                <option value="montanha">Montanha</option>
                <option value="urbana">Urbana</option>
            </select>
            @error('category') <span>{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="tag" class="form-label">Tags da Viagem:</label>
            <select id="tag" name="tag" class="form-input" required>
                <option value="">Selecione as tags da viagem</option>
                <option value="aventura">#Aventura</option>
                <option value="cultural">#Cultural</option>
                <option value="praia">#Praia</option>
                <option value="montanha">#Montanha</option>
                <option value="urbana">#Urbana</option>
            </select>
            @error('tag') <span>{{ $message }}</span> @enderror
        </div>     
    
        <div class="form-group">
            <label for="text" class="form-label">Descrição da Viagem:</label>
            <textarea id="text" name="text" class="form-input" required>{{ old('text') }}</textarea>
            @error('text') <span>{{ $message }}</span> @enderror
        </div>
    
        <input type="submit" class="submit-button" value="Enviar">
    </form>
</div>
@endsection
