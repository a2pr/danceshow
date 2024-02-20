@extends('layouts.app')
@section('title', 'Alunos Page')

@section('content')
<div class="mb-2">
    <a class="btn btn-primary" href="{{route('attendance.create')}}">Adicionar frequencia</a>
</div>
<div class="list-group">
    @if (empty($attendanceViewModels))
        <p>No Attendance available.</p>
    @else
        @foreach ($attendanceViewModels as $attendanceViewModel)
            <div class="list-group-item">
                <p>Attendance date: {{ $attendanceViewModel->getAttendanceDate() }}</p>
                <p>student name: {{ $attendanceViewModel->getStudentName() }}</p>
                <p>course name: {{ $attendanceViewModel->getCourseName() }}</p>
            </div>
        @endforeach
    @endif
</div>
@endsection
