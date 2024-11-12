@extends('layouts.header_footer')

@section('content')
<div class="containerAllTags">
    {{-- Exibe uma mensagem de sucesso, caso exista --}}
    @if(session('message-success'))
    <div class="alert alert-success">
        {{ session('message-success') }}
    </div>
    @endif

    {{-- Lista de Tags --}}
    <div class="tags-list">
        <div class="table-tags-container" style="background: #285ec2; border-radius: 20px;">
            <h2 style="color: white;">Lista de Tags</h2>

            {{-- Exibe a tabela com tags --}}
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Título da Tag</th>
                        <th>Editar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Verifica se há tags --}}
                    @forelse ($tags as $tag)
                    <tr>
                        <td>{{ $tag->title }}</td>
                        <td>
                            <a href="{{ route('listTagById', ['id' => $tag->id]) }}" class="btn btn-edit">Editar</a>
                        </td>
                        <td>
                            {{-- Formulário de exclusão com confirmação --}}
                            <form action="{{ route('deleteTag', ['id' => $tag->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta tag?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    {{-- Caso não haja tags, exibe uma mensagem --}}
                    <tr>
                        <td colspan="3" class="text-center">Nenhuma tag encontrada.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection