<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViajaForum</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: #ececec;
        }

        .left-box {
            background: #103cbe;
            display: flex;
            flex-direction: column;
            justify-content: flex-end; 
            padding: 20px;
            height: 100%; 
        }

        .featured-image img {
            width: 100%; 
            border-radius: 20px; 
        }

        .text-white {
            margin-top: 10px; 
        }

        .box-area {
            width: 930px; 
        }

        .text-danger {
            color: #dc3545; 
            font-size: 14px; 
            margin-top: 4px; 
            border: 1px solid #dc3545; 
            padding: 5px; 
            display: block; 
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image mb-2">
                    <img src="{{ asset('images/login.jpg') }}" class="img-fluid">
                </div>
                <div class="text-white fs-2">ViajaForum</div>
                <div class="text-white text-wrap text-center">Desbrave Novos Horizontes!</div>
            </div>

            <div class="col-md-6 right-box">
                <form action="{{ route('login')}}" method="POST" class="login-form">
                    <h2 class="login-title">Bem vindo de volta!</h2>
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control form-control-lg bg-light fs-6" value="{{ old('email') }}" required>
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha:</label>
                        <input type="password" id="password" name="password" class="form-control form-control-lg bg-light fs-6">
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                    </div>
                    <div class="row">
                        <small>Não tem uma conta? <a href="{{ route('register') }}">Registre-se</a></small>
                        <small>Deseja voltar para o inicio? <a href="/">Inicio</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
