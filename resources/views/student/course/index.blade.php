@extends('layouts.app')
@section('title', 'Alunos Page')

@section('content')
    <div>
        @if (empty($studentCourseViewModels))
            <p>Nenhum aluno disponivel</p>
        @else
            @foreach ($studentCourseViewModels as $course)
                <div>
                    <p>Nome do Aluno: {{ $course->getStudentName() }}</p>
                    <p>Nome de Aula: {{ $course->getCourseName() }}</p>
                </div>
                <hr>
            @endforeach
        @endif
    </div>
@endsection
