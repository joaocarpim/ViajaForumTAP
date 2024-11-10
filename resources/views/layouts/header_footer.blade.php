<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('images/masterIcon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
    <script src="{{ asset('js/sidebar.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <title> ViajaForum </title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
        
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f6fc13;
        }
        .navbar, .sidebar {
            background: #285ec2; 
        }

        .card-img-top {
            border-radius: 50px;
            padding: 20px;
        }

        .card {
            border-radius: 30px;
            box-shadow: rgba(6, 84, 201, 0.658) 0px 1px 2px 0px;
        }

        .card-body {
            padding: 15px;
            margin-top: 15px;
        }

        .btn-primary {
            border-radius: 12px;
            width: 120px;
        }

        .btn-primary:hover {
            background-color: rgb(0, 80, 199);
            border: none;
        }

        h3, h5 {
            color: rgb(0, 91, 228);
        }
    </style>
</head>

<body>

    <div id="app">
        @if (Session::has('message-sucess'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    toastr.success("{{ session('message-sucess') }}");
                    timeOut: 4000
                });
            </script>
        @elseif (Session::has('message-error'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    toastr.error("{{ session('message-error') }}");

                    timeOut: 4000
                });
            </script>
        @endif
        <div class="navbar">
            <i class="fa fa-bars" id="btn-navbar"></i>
            <div class="titleWrapper">
                <a href="{{ route('teste') }}">
                    <h1 class="Title">ViajaForum</h1>
                </a>
            </div>
            @if (Auth::check())
                <div class="nav-icon">
                    <a href="{{ route('listUserById', [Auth::user()->id]) }}" class="nav-icon">
                        <i class="fas fa-user-circle"></i>
                    </a>
                </div>
                <div class="nav-icon">
                    <a href="logout" class="nav-icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            @else
                <a class="navbar-link" href="register">Cadastre-se</a>
                <a class="navbar-link" href="login">Entrar</a>
            @endif
        </div>
        <div id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <span class="menu-text">Menu</span>
                <i class="fas fa-times" id="close-btn"></i>
            </div>
            <div class="sidebar-content">
                <a href="{{ route('teste') }}"> Início</a>
                <a href="{{ route('listAllUsers') }}"> Tabela Usuários</a>

                <a href="#collapsePost" data-bs-toggle="collapse"> Posts</a>
                <div class="collapse" id="collapsePost">
                    <a href="{{ route('listAllPosts') }}">Visualizar</a>
                    <a href="{{ route('createPost') }}">Criar</a>
                </div>

                <a href="#collapseTopicos" data-bs-toggle="collapse">Topicos</a>
                <div class="collapse" id="collapseTopicos">
                <a href="{{ route('topics.listAllTopics') }}">Visualizar</a>
                <a href="{{ route('topics.create') }}">Criar</a>

                </div>

                <a href="#collapseTag" data-bs-toggle="collapse"> Tags</a>
                <div class="collapse" id="collapseTag">
                    <a href="{{ route('listAllTags') }}">Visualizar</a>
                    <a href="{{ route('createTag') }}">Criar</a>
                </div>

                <a href="#collapseCategoria" data-bs-toggle="collapse"> Categorias</a>
                <div class="collapse" id="collapseCategoria">
                    <a href="{{ route('listAllCategories') }}">Visualizar</a>
                    <a href="{{ route('createCategory') }}">Criar</a>
                </div>

                @if (Auth::check())
                    <a href="{{ route('listUserById', [Auth::user()->id]) }}" class="sidebar-user">Meu Perfil</a>
                    <a href="{{ route('logout') }}" class="sidebar-user">Sair</a>
                @else
                    <a class="sidebar-user" href="register">Cadastre-se</a>
                    <a class="sidebar-user" href="login">Entrar</a>
                @endif
            </div>
        </div>
    </div>
    <main>
        @yield('content')
    </main>

</body>

</html>
