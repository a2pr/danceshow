@extends('layouts.app')
@section('title', 'Professor')

@section('content')
<div>
    @if (empty($teacherCourseViewModels))
        <p>Sem items disponiveis</p>
    @else
        @foreach ($teacherCourseViewModels as $value)
            <div>
                <p>Nome do Professor: {{ $value->getTeacherName() }}</p>
                <p>Nome da Aula: {{ $value->getCourseName() }}</p>
            </div>
            <hr>
        @endforeach
    @endif
</div>
@endsection
