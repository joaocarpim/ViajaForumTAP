@extends('layouts.header_footer')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Criar Novo Post</h2>

            <!-- Exibe mensagens de erro ou sucesso -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Campo de Título -->
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo de Categoria -->
                <div class="form-group">
                    <label for="category">Categoria</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="">Selecione uma categoria</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo de Tags -->
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control" multiple required>
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    @error('tags')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo de Conteúdo -->
                <div class="form-group">
                    <label for="content">Conteúdo</label>
                    <textarea id="content" name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
                    @error('content')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo de Imagem -->
                <div class="form-group">
                    <label for="image">Imagem (opcional)</label>
                    <input type="file" id="image" name="image" class="form-control">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Criar Post</button>
            </form>
        </div>
    </div>
</div>
@endsection