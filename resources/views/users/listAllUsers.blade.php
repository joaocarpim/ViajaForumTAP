@extends('layouts.header_footer')

@section('content')
    <header>
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
            body {
                font-family: 'Poppins', sans-serif;
            }
            .containerAllUsers, .user-list {
                background: #285ec2; 
            }
            .containerAllUsers, .modal-content, .modal-header, .modal-body, .modal-footer, .btn, .table, .table-striped {
                font-family: 'Poppins', sans-serif;
            }
        </style>
    </header>

    <div class="containerAllUsers">
        <div class="user-list" style="font-family: 'Poppins', sans-serif;">
            <h2 class="text-white">Lista de Usuários</h2>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-warning"><i class="fa-solid fa-head-side-cough-slash"></i> Suspender</a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#banModal"><i class="fa-solid fa-user-slash"></i> Banir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="banModal" tabindex="-1" aria-labelledby="banModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="banModalLabel">Banir Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Você tem certeza que deseja banir este usuario?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-rotate-left"></i> Voltar
                        </button>
                        <button type="button" class="btn btn-danger">
                            <i class="fa-solid fa-user-slash"></i> Confirmar Banimento
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
