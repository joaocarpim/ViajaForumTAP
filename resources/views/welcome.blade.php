@extends('layouts.header_footer')

@section('content')
    <header>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Gluten:wght@100..900&display=swap" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet"/>
    <script src="{{ asset('js/carrosel.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    </header>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');    

            .container {
                font-family: 'Poppins', sans-serif;
                background: #ececec;
            }
        </style>  

    <div class="container">
        <div class="container containerWelcome" style="background-color: #103CBE;" >
            <div class="text">
                <h1 class="TituloWelcome">Seja Bem vindo Ao ViajaForum!</h1>
                <p style="color: #fff;">Participe da nossa comunidade de exploradores globais e tenha acesso a conselhos de viagem exclusivos, recomendações de destinos e histórias inspiradoras!</p>
            </div>
            <div class="image" >
                <img src="{{ asset('images/login.jpg') }}">
            </div>
        </div>

        <div class="containerWelcome" style="background-color: #103CBE;" >
            <div class="image" style="border: rgb(0, 80, 199); background-color: #fff; border-radius: 10px;">
                <img src="{{ asset('images/logo.png') }}">
            </div>
            <div class="text">
                <h1 class="TituloWelcome">Debata Navegando por discussões detalhadas!</h1>
                <p style="color: #fff;">Encontre respostas para todas as suas perguntas de viagem, apoiado por uma comunidade dedicada e bem informada</p>
            </div>
        </div>

        <div class="ContainerCarrosel" style="background-color: #fff;">
            <h2 class="TituloWelcome" style="color: #000;" >Conheça nossos Tópicos!</h2>
            <div class="slider-wrapper" >
                <button id="prev-slide" class="slide-button material-symbols-rounded">chevron_left</button>
                <div class="image-list">
                    <div class="image-item">
                        <img src="{{ asset('images/logo1.png') }}" style="width: 35%; height: 65%;" alt="img-1">
                        <p class="image-text" style="color: #000;">Destinos</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/logo1.png') }}" style="width: 35%; height: 65%;" alt="img-2">
                        <p class="image-text" style="color: #000;">Dicas</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/logo1.png') }}" style="width: 35%; height: 65%;" alt="img-3">
                        <p class="image-text" style="color: #000;">Experiência</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/logo1.png') }}" style="width: 35%; height: 65%;" alt="img-4">
                        <p class="image-text" style="color: #000;">Aventura</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/logo1.png') }}" style="width: 35%; height: 65%;" alt="img-5">
                        <p class="image-text" style="color: #000;">Roteiros</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/logo1.png') }}" style="width: 35%; height: 65%;" alt="img-6">
                        <p class="image-text" style="color: #000;">Gastronomia</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/logo1.png') }}" style="width: 35%; height: 65%;" alt="img-7">
                        <p class="image-text" style="color: #000;">Hospedagens</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/logo1.png') }}" style="width: 35%; height: 65%;" alt="img-8">
                        <p class="image-text" style="color: #000;">Fotos</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/logo1.png') }}" style="width: 35%; height: 65%;" alt="img-9">
                        <p class="image-text" style="color: #000;">Histórias</p>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('images/logo1.png') }}" style="width: 35%; height: 65%;" alt="img-10">
                        <p class="image-text" style="color: #000;">Perguntas</p>
                    </div>
                </div>
                <button id="next-slide" class="slide-button material-symbols-rounded">chevron_right</button>
            </div>

            <div class="slider-scrollbar">
                <div class="scrollbar-track">
                    <div class="scrollbar-thumb"></div>
                </div>
            </div>
        </div>

        <div class="container py-5">
            <h1 class="text-center"  style="color: #000;">Veja só!</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
                <div class="col">
                    <div class="card">
                        <img src="./images/logo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #285ec2;">VIAGENS</h5>
                            <p class="card-text">Compartilhe suas aventuras mais incríveis e dicas de viagem indispensáveis neste espaço dedicado a explorar o mundo. De roteiros exóticos a destinos clássicos, inspire-se com relatos e fotos de viajantes apaixonados!.</p>

                        </div>
                        <div class="mb-5 d-flex justify-content-around">
                            <h3>Voar</h3>
                            <button class="btn btn-primary">Saiba mais</button>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="./images/logo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #285ec2;">VIAGENS</h5>
                            <p class="card-text">Compartilhe suas aventuras mais incríveis e dicas de viagem indispensáveis neste espaço dedicado a explorar o mundo. De roteiros exóticos a destinos clássicos, inspire-se com relatos e fotos de viajantes apaixonados!.</p>

                        </div>
                        <div class="mb-5 d-flex justify-content-around">
                            <h3>Voar</h3>
                            <button class="btn btn-primary">Saiba mais</button>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="./images/logo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #285ec2;" >VIAGENS</h5>
                            <p class="card-text">Compartilhe suas aventuras mais incríveis e dicas de viagem indispensáveis neste espaço dedicado a explorar o mundo. De roteiros exóticos a destinos clássicos, inspire-se com relatos e fotos de viajantes apaixonados!.</p>

                        </div>
                        <div class="mb-5 d-flex justify-content-around">
                            <h3>Voar</h3>
                            <button class="btn btn-primary">Saiba mais</button>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="./images/logo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #285ec2;">VIAGENS</h5>
                            <p class="card-text">Compartilhe suas aventuras mais incríveis e dicas de viagem indispensáveis neste espaço dedicado a explorar o mundo. De roteiros exóticos a destinos clássicos, inspire-se com relatos e fotos de viajantes apaixonados!.</p>

                        </div>
                        <div class="mb-5 d-flex justify-content-around">
                            <h3>Voar</h3>
                            <button class="btn btn-primary">Saiba mais</button>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="./images/logo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #285ec2;">VIAGENS</h5>
                            <p class="card-text">Compartilhe suas aventuras mais incríveis e dicas de viagem indispensáveis neste espaço dedicado a explorar o mundo. De roteiros exóticos a destinos clássicos, inspire-se com relatos e fotos de viajantes apaixonados!.</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around">
                            <h3>Voar</h3>
                            <button class="btn btn-primary">Saiba mais</button>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="./images/logo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #285ec2;">VIAGENS</h5>
                            <p class="card-text">Compartilhe suas aventuras mais incríveis e dicas de viagem indispensáveis neste espaço dedicado a explorar o mundo. De roteiros exóticos a destinos clássicos, inspire-se com relatos e fotos de viajantes apaixonados!.</p>
                        </div>
                        <div class="mb-5 d-flex justify-content-around">
                            <h3>Voar</h3>
                            <button class="btn btn-primary">Saiba mais</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
