{{--@extends('layouts.app') <!-- Adjust this based on your layout structure -->--}}

{{--@section('content')--}}
    <div class="container">
        <h2>Edit Course</h2>
        <form method="POST" action="{{ route('course.update',$course) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="course_name">Course name:</label>
                <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $course->course_name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
{{--
@endsection--}}
