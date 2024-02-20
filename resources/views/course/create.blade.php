@extends('layouts.app')
@section('title', 'Aulas Page')

@section('content')
    <div class="container">
        <h2>Criar Aula</h2>
        <div class="col-4">

            <form method="post" action="{{ route('course.store') }}">
                @csrf
                <div class="form-group">
                    <label for="course_name">Nome:</label>
                    <input type="text" class="form-control" id="course_name" name="course_name" required>
                </div>
                <br/>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
