@extends('layouts.header_footer')

@section('content')
    <header>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

<<<<<<< HEAD
        .submit-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
=======
            .submit-button {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
            }
>>>>>>> 7b4248e196bf32428f644cf9686827cc2106c383

            .submit-button:hover {
                background-color: #45a049;
            }

<<<<<<< HEAD
        .create-post-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
        }
=======
            .create-post-container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #f9f9f9;
                border-radius: 10px;
            }
>>>>>>> 7b4248e196bf32428f644cf9686827cc2106c383

            .create-post-title {
                font-size: 24px;
                font-weight: 500;
                text-align: center;
                margin-bottom: 20px;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-label {
                font-weight: bold;
                margin-bottom: 5px;
                display: block;
            }

            .form-input {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
            }

            .form-input:focus {
                border-color: #4CAF50;
                outline: none;
            }

<<<<<<< HEAD
        .text-danger {
            color: red;
            font-size: 14px;
        }
    </style>

    <div class="create-post-container">
        <h1 class="create-post-title">Criar Tópico</h1>

        <form method="POST" action="{{ route('storeTopic') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" id="title" class="form-input" value="{{ old('title') }}" required>
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Descrição</label>
                <textarea name="description" id="description" class="form-input" required>{{ old('description') }}</textarea>
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id" class="form-label">Categoria</label>
                <select name="category_id" id="category_id" class="form-input" required>
                    @foreach ($categories as $category)
                    <option value="{{ $category->idCategory }}" {{ old('category_id') == $category->idCategory ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-input" required>
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Ativo</option>
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inativo</option>
                </select>
                @error('status')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Imagem (Opcional)</label>
                <input type="file" name="image" id="image" class="form-input">
                @error('image')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="submit-button">Criar Tópico</button>
            </div>
        </form>
    </div>
</header>
@endsection
=======
            .text-danger {
                color: red;
                font-size: 14px;
            }
        </style>

        <div class="create-post-container">
            <h1 class="create-post-title">Criar Tópico</h1>

            <form method="POST" action="{{ route('storeTopic') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" name="title" id="title" class="form-input" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea name="description" id="description" class="form-input" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_id" class="form-label">Categoria</label>
                    <select name="category_id" id="category_id" class="form-input" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->idCategory }}" {{ old('category_id') == $category->idCategory ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-input" required>
                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Ativo</option>
                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inativo</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image" class="form-label">Imagem (Opcional)</label>
                    <input type="file" name="image" id="image" class="form-input">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="submit-button">Criar Tópico</button>
                </div>
            </form>
        </div>
    </header>
@endsection
>>>>>>> 7b4248e196bf32428f644cf9686827cc2106c383
