{{--@extends('layouts.app') <!-- Adjust this based on your layout structure -->--}}

{{--@section('content')--}}
    <div class="container">
        <h2>Edit Student</h2>
        <form method="POST" action="{{ route('student.update',$student) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $student->cpf }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $student->phone }}" required>
            </div>
            <div class="form-group">
                <label for="birthday">Date of Birth:</label>
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $student->birthday }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
{{--
@endsection--}}
