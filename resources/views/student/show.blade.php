@extends('layouts.app')
@section('title', 'Alunos Page')

@section('content')
    <div>
        <div>
            <p>Nome: {{ $student->name }}</p>
            <p>cpf: {{ $student->cpf }}</p>
            <h4>Pacote atribuído:</h4>
            @include('../package/layouts/packages', ['viewModels' => $viewModels])
            <hr/>
            <a class="btn btn-primary" href="{{ route('student.edit', $student) }}">Editar Aluno</a>
            <a class="btn btn-danger" href="{{ route('student.destroy', $student) }}"
               onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                Apagar Aluno
            </a>

            <form id="delete-form" action="{{ route('student.destroy', $student) }}" method="POST"
                  style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
        <hr>
    </div>
@endsection
