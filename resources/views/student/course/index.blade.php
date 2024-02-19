@extends('layouts.app')
@section('title', 'Courses Page')

@section('content')
    <div>
        @if (empty($studentCourseViewModels))
            <p>No students available.</p>
        @else
            @foreach ($studentCourseViewModels as $course)
                <div>
                    <p>Student_name: {{ $course->getStudentName() }}</p>
                    <p>Course Name: {{ $course->getCourseName() }}</p>
                </div>
                <hr>
            @endforeach
        @endif
    </div>
@endsection
