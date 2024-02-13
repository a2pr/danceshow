<!-- resources/views/students/create.blade.php -->

{{--@extends('layouts.app')--}} <!-- You might need to adjust this based on your layout structure -->

{{--@section('content')--}}
    <div class="container">
        <h2>Create Student</h2>
        <form method="post" action="{{ route('student.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="birthday">Date of Birth:</label>
                <input type="date" class="form-control" id="birthday" name="birthday" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
{{--@endsection--}}
