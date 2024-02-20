@extends('layouts.app')
@section('title', 'Frequência Page')

@section('content')
<div class="row">
    <h2>Create Frequência</h2>
    <div class="col-6">
        <form method="post" action="{{ route('attendance.store') }}">
            @csrf

            <div class="form-group">
                <label for="student_id">Aluno:</label>
                <select class="form-control" id="student_id" name="student_id">
                    <option value="" disabled selected>Select an option</option>
                    @foreach ($students as $value )
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            <br/>
            <div class="form-group">
                <label for="course_id">Aula:</label>
                <select class="form-control" id="course_id" name="course_id">
                    <option value="" disabled selected>Select an option</option>
                    @foreach ($courses as $value )
                        <option value="{{ $value->id }}">{{ $value->course_name }}</option>
                    @endforeach
                </select>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
@endsection
