@extends('layouts.header_footer')

@section('content')
<div class="container">
    <h2>Editar Tópico</h2>

    <form action="{{ route('topics.update', ['id' => $topic->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $topic->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $topic->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="1" {{ old('status', $topic->status) == 1 ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ old('status', $topic->status) == 0 ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach ($categories as $category)
<<<<<<< HEAD
                <option value="{{ $category->idCategory }}" {{ old('category_id', $topic->category_id) == $category->idCategory ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
=======
                    <option value="{{ $category->idCategory }}" {{ old('category_id', $topic->category_id) == $category->idCategory ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
>>>>>>> 7b4248e196bf32428f644cf9686827cc2106c383
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 7b4248e196bf32428f644cf9686827cc2106c383
