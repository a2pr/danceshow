@extends('layouts.app')
@section('title', 'Courses Page')

@section('content')
    <div>
        <h2>Estatistica courses</h2>
        <div class="row">
            <h4>Desde o comeco</h4>
            <span>Aula com mas frecuencia: {{$courseStat['leaderboard']['max']['course_name']}}</span>
            <span>Aula com menos frecuencia: {{$courseStat['leaderboard']['min']['course_name']}}</span>
            <h4>No atual mes:</h4>

            <span>Aula com mas frecuencia: {{$courseStat['leaderboard']['current_month']['max']['course_name']}}</span>
            <span>Aula com menos frecuencia: {{$courseStat['leaderboard']['current_month']['min']['course_name']}}</span>
        </div>
        <hr/>
        <div class="row">
            <h3>Aulas</h3>
            @if ($courses->isEmpty())
                <p>No students available.</p>
            @else
                @foreach ($courses as $course)
                    <div class="col-4">
                        <p>Course Name: {{ $course->course_name }}</p>
                    </div>
                @endforeach
            @endif
        </div>
        <hr/>
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
