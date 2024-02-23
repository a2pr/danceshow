@extends('layouts.app')
@section('title', 'Aulas Page')

@section('content')
    <div>
        <h2>Estatisticas Aulas</h2>
        <div class="row">
            <h4>Desde o comeco</h4>
            <span>Aula com maior frecuencia: {{$courseStat['leaderboard']['max']['course_name']}}</span>
            <span>Aula com menos frecuencia: {{$courseStat['leaderboard']['min']['course_name']}}</span>
            <h4>No atual mes:</h4>

            <span>Aula com maior frecuencia: {{$courseStat['leaderboard']['current_month']['max']['course_name']}}</span>
            <span>Aula com menos frecuencia: {{$courseStat['leaderboard']['current_month']['min']['course_name']}}</span>
        </div>
        <hr/>
        <div class="row">
            <h3>Aulas</h3>
            @if ($courses->isEmpty())
                <p>Nenhum aluno disponivel</p>
            @else
                @foreach ($courses as $course)
                    <div class="col-4">
                        <p>Nome de aula: {{ $course->course_name }}</p>
                    </div>
                @endforeach
            @endif
        </div>
        <div>
            <a class="btn btn-primary" href="{{route('course.create')}}"> Adicionar nova aula</a>
        </div>
        <hr/>
        <div>
            Quantidade de Aulas: {{$courseStat['all']}}
            <div class="row">
                @foreach($courseStat['courses'] as $index => $course)
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                Nome da aula: {{$index}} <br/>
                                Quantidade de aluno: {{$course['student_count']}}
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
