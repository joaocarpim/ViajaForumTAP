@extends('layouts.app')

@section('content')
<h1>Criar Categoria</h1>

<form action="{{ url('/categories') }}" method="POST">
    @csrf
    <label for="name">Nome:</label>
    <input type="text" name="name" required>
    <button type="submit">Criar</button>
</form>
@endsection


