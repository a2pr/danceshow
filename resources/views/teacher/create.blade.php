@extends('layouts.app')
@section('title', 'Professor')

@section('content')
    <div class="container">
        <h2>Adicionar Aluno</h2>
        <form method="post" action="{{ route('teacher.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection
