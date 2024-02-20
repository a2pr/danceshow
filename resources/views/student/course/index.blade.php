@extends('layouts.app')
@section('title', 'Aulas Page')

@section('content')
    <div>
        @if (empty($studentCourseViewModels))
            <p>No Alunos available.</p>
        @else
            @foreach ($studentCourseViewModels as $course)
                <div>
                    <p>Student Nome: {{ $course->getStudentName() }}</p>
                    <p>Course Nome: {{ $course->getCourseName() }}</p>
                </div>
                <hr>
            @endforeach
        @endif
    </div>
@endsection
