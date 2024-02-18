<!-- resources/views/courses/create.blade.php -->

{{--@extends('layouts.app')--}} <!-- You might need to adjust this based on your layout structure -->

{{--@section('content')--}}
    <div class="container">
        <h2>Create Course</h2>
        <form method="post" action="{{ route('course.store') }}">
            @csrf
            <div class="form-group">
                <label for="course_name">Name:</label>
                <input type="text" class="form-control" id="course_name" name="course_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
{{--@endsection--}}
