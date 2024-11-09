@extends('layouts.header_footer')

@section('content')
    <div class="containerAllTags">
        @if(session('message-success'))
            <div class="alert alert-success">
                {{ session('message-success') }}
            </div>
        @endif
        <div class="tags-list">
            <div class="table-tags-container" style="background: #285ec2; border-radius: 20px;">
                <h2>Lista de Tags</h2>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Título da Tag</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->title }}</td>
                                <td>
                                    <a href="{{ route('listTagById', ['id' => $tag->id]) }}" class="btn btn-edit">Editar</a>
                                </td>
                                <td>
                                    <form action="{{ route('deleteTag', ['id' => $tag->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Excluir">
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
