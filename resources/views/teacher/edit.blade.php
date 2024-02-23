@extends('layouts.app')
@section('title', 'Professor')

@section('content')
    <div class="container">
        <h2>Editar Aluno</h2>
        <form method="POST" action="{{ route('teacher.update',$teacher) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $teacher->name }}" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $teacher->cpf }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
