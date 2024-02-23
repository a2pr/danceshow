@extends('layouts.app')
@section('title', 'Frequência')

@section('content')
<div>
    <div>
        <p>Frequência data: {{ $attendanceViewModel->getAttendanceDate() }}</p>
        <p>Nome do Aluno: {{ $attendanceViewModel->getStudentName() }}</p>
        <p>Nome da Aula: {{ $attendanceViewModel->getCourseName() }}</p>
    </div>
    <hr>
</div>
@endsection
