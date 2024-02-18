@extends('layouts.app')
@section('title', 'Courses Page')

@section('content')
    <div>
        <h3>Courses</h3>
        @if ($courses->isEmpty())
            <p>No students available.</p>
        @else
            @foreach ($courses as $course)
                <div>
                    <p>Course Name: {{ $course->course_name }}</p>
                </div>
                <hr>
            @endforeach
        @endif
        <br/>
        <div>
            Course amount: {{$courseStat['all']}}
            <div class="row">
                @foreach($courseStat['courses'] as $index => $course)
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                Course Name: {{$index}} <br/>
                                Student amount: {{$course['student_count']}}
                                <ul>
                                @foreach($course['students'] as  $students)
                                    <li>{{$students}}</li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
