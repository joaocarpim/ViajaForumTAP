@extends('layouts.header_footer')

@section('content')
    <header>
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Gluten:wght@100..900&display=swap" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
        <script src="{{ asset('js/carrosel.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    </header>

    <div class="container">
    
        <div class="container containerWelcome" style="background-color: #103CBE;">
            <div class="text">
                <h1 class="TituloWelcome">Seja Bem-vindo Ao ViajaForum!</h1>
                <p>Participe da nossa comunidade de exploradores globais e tenha acesso a conselhos de viagem exclusivos,
                    recomendações de destinos e histórias inspiradoras!</p>
            </div>
            <div class="image">
                <img src="{{ asset('images/login.jpg') }}" alt="Imagem de boas-vindas">
            </div>
        </div>

        
        <div class="containerWelcome" style="background-color: #103CBE;">
            <div class="image" style="border: rgb(0, 80, 199); background-color: #fff; border-radius: 10px;">
                <img src="{{ asset('images/logo.png') }}" alt="Logo do fórum">
            </div>
            <div class="text">
                <h1 class="TituloWelcome">Debata Navegando por discussões detalhadas!</h1>
                <p>Encontre respostas para todas as suas perguntas de viagem, apoiado por uma comunidade dedicada e bem
                    informada.</p>
            </div>
        </div>

     
        <div class="ContainerCarrosel" style="background-color: #fff;">
            <h2 class="TituloWelcome" style="color: #000;">Conheça nossos Recursos!</h2>
            <div class="row text-center mt-4">
                <div class="col-md-3">
                    <a href="{{ route('listAllPosts') }}" class="btn btn-primary w-100">Ver Todos os Posts</a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('topics.listAllTopics') }}" class="btn btn-primary w-100">Ver Todos os Tópicos</a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('listAllCategories') }}" class="btn btn-primary w-100">Ver Todas as Categorias</a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('listAllTags') }}" class="btn btn-primary w-100">Ver Todas as Tags</a>
                </div>
            </div>
        </div>
    </div>
@endsection
