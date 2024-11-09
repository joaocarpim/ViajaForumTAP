@extends('layouts.header_footer')

@section('content')
<div class="containerAllUsers">
    <div class="categories-list">
        <div class="table-categories-container">
            <h2>Lista de Categorias</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Título da Categoria</th>
                        <th>Editar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->title }}</td>
                        <td>
                            <a href="{{ route('editCategory', $category->idCategory) }}" class="btn btn-edit">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('deleteCategory', $category->idCategory) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
