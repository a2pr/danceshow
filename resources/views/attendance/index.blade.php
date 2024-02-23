@extends('layouts.app')
@section('title', 'Alunos Page')

@section('content')
<div class="mb-2">
    <a class="btn btn-primary" href="{{route('attendance.create')}}">Adicionar frequencia</a>
</div>
<div class="list-group">
    @if (empty($attendanceViewModels))
        <p>Nenhuma Frequência disponivel.</p>
    @else
        @foreach ($attendanceViewModels as $attendanceViewModel)
            <div class="list-group-item">
                <p>Frequência data: {{ $attendanceViewModel->getAttendanceDate() }}</p>
                <p>Nome do Aluno: {{ $attendanceViewModel->getStudentName() }}</p>
                <p>Nome da Aula: {{ $attendanceViewModel->getCourseName() }}</p>
            </div>
        @endforeach
    @endif
</div>
@endsection
