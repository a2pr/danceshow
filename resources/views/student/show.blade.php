@extends('layouts.app')
@section('title', 'Aulas Page')

@section('content')
    <div>
        <div>
            <p>Id: {{ $student->id }}</p>
            <p>Nome: {{ $student->name }}</p>
            <p>cpf: {{ $student->cpf }}</p>
            <h4>Packages assign:    </h4>
            @include('../package/layouts/packages', ['viewModels' => $viewModels])
            <hr/>
            <a class="btn btn-primary" href="{{ route('student.edit', $student) }}">Edit Student</a>
            <a class="btn btn-danger" href="{{ route('student.destroy', $student) }}"
               onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                Delete Student
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
