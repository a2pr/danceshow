@extends('layouts.app')
@section('title', 'Alunos Page')

@section('content')
    <div class="mb-2">
        <a class="btn btn-primary" href="{{route('student.create')}}"> Adicionar novo Aluno</a>
    </div>
<div class="list-group">
    @if ($students->isEmpty())
        <p>No students available.</p>
    @else
        @foreach ($students as $student)
            <div class="list-group-item">
                <p>Name: {{ $student->name }}</p>
                <p>cpf: {{ $student->cpf }}</p>
                <a class="btn btn-info" href="{{route('student.show',['student'=>$student->id])}}"> show</a>
            </div>
        @endforeach
    @endif
</div>
@endsection
