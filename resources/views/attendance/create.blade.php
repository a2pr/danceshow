<!-- resources/views/students/create.blade.php -->

{{--@extends('layouts.app')--}} <!-- You might need to adjust this based on your layout structure -->

{{--@section('content')--}}
@include('../default')
<div class="container">
    <h2>Create Attendance</h2>
    <form method="post" action="{{ route('attendance.store') }}">
        @csrf

        <div class="form-group">
            <select id="student_id" name="student_id">
                <option value="" disabled selected>Select an option</option>
                @foreach ($students as $value )
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select id="course_id" name="course_id">
                <option value="" disabled selected>Select an option</option>
                @foreach ($courses as $value )
                    <option value="{{ $value->id }}">{{ $value->course_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
{{--@endsection--}}
