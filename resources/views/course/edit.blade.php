{{--@extends('layouts.app') <!-- Adjust this based on your layout structure -->--}}

{{--@section('content')--}}
    <div class="container">
        <h2>Editar Aula</h2>
        <form method="POST" action="{{ route('course.update',$course) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="course_name">Nome da Aula:</label>
                <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $course->course_name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
{{--
@endsection--}}
