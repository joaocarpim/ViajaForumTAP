@extends('layouts.header_footer')

@section('content')
<header>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: #ececec;
        }
    </style>
</header>

<div class="container profile-container"> 
    @if ($user != null)
        <form action="{{ route('updateUser', [$user->id]) }}" method="POST" class="profile-form" enctype="multipart/form-data">
            @csrf
            @method('put')
            <h2 class="text-center" style="color: #000; font-family: 'Poppins', sans-serif;">Foto de Perfil</h2>
            
            <div class="mb-3 text-center">
                @if ($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto de Perfil" class="img-thumbnail" width="150">
                @else
                    <p>Sem foto de perfil</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Atualizar Foto:</label>
                <input type="file" id="photo" name="photo" class="form-control">
                @error('photo') <span class="text-danger">{{$message}}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label" style="color: #000; font-family: 'Poppins', sans-serif;">Nome:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" placeholder="{{ $user->name }}" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label" style="color: #000; font-family: 'Poppins', sans-serif;">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="{{ $user->email }}" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label" style="color: #000; font-family: 'Poppins', sans-serif;">Senha:</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="row">
                <div class="col-6">
                    <input type="submit" class="btn btn-primary w-100" style="font-family: 'Poppins', sans-serif;" value="Editar">
                </div>
                <div class="col-6">
                    <a class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#banModal" style="font-family: 'Poppins', sans-serif;">
                        <i class="fa-solid fa-ban"></i> Excluir perfil
                    </a>
                </div>
            </div>
        </form>

        <div class="modal fade" id="banModal" tabindex="-1" aria-labelledby="banModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="font-family: 'Poppins', sans-serif;">
                        <h5 class="modal-title" id="banModalLabel">Excluir perfil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="font-family: 'Poppins', sans-serif;">
                        Você tem certeza que deseja excluir seu perfil?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-family: 'Poppins', sans-serif;">
                            <i class="fa-solid fa-rotate-left"></i> Voltar
                        </button>
                        <form action="{{ route('deleteUser', [$user->id]) }}" method="POST" class="w-50">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value=" Confirmar" style="font-family: 'Poppins', sans-serif;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
