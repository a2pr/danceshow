@extends('layouts.app')
@section('title', 'Home Page')

@section('content')
    <div class="container-fluid">
        <h2>Dashboard</h2>
        <hr/>
        <div class="row justify-content-md-center">
            <div class="col-4 ">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Estatisticas</h4>
                        <p class="card-text">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">Total Alunos:
                                <span class="badge bg-primary rounded-pill">{{$studentsData['all']}}</span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Alunos Ativos:
                                <span class="badge bg-primary rounded-pill">{{$studentsData['active']}}</span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Alunos
                                Inativos: <span
                                    class="badge bg-primary rounded-pill">{{$studentsData['inactive']}}</span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Alunos sem
                                pacotes: <span class="badge bg-primary rounded-pill">{{$studentsData['without']}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Pacotes por
                                intervalo: <span
                                    class="badge bg-primary rounded-pill">{{$studentsData['package_type']['interval']}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">Pacotes por
                                aula: <span
                                    class="badge bg-primary rounded-pill">{{$studentsData['package_type']['amount']}}</span>
                            </li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
            {{--            <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Alunos com pacotes de aulas expirando</h4>
                                    <div class="card-text">
                                        @foreach($studentWithPackagesEndingSoon as $value)
                                            <ul>
                                                <li>Nome de alunos: {{$value['student_name']}}</li>
                                                <li>Pacote: {{$value['package_name']}}</li>
                                                <li>Aulas restantes: {{$value['remaining_amount']}}</li>
                                            </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>--}}
            {{--            <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Alunos com pacotes com intervalo expirando no mes {{ \Carbon\Carbon::now()->format('F Y') }}</h4>
                                    <div class="card-text">
                                        @foreach($studentWithPackagesEndingCurrentMonth as $value)
                                            <ul>
                                                <li>Nome de alunos: {{$value['student_name']}}</li>
                                                <li>Pacote: {{$value['package_name']}}</li>
                                                <li>Data de expiração : {{$value['end_date']}}</li>
                                            </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>--}}
        </div>
        <br/>
        <div class="text-center">
            <a class="btn btn-primary" href="{{route('student.create')}}"> Adicionar novo Aluno</a>
            <a class="btn btn-primary" href="{{route('package-definition.create')}}"> Adicionar novo Pacote</a>
            <a class="btn btn-primary" href="{{route('attendance.create')}}"> Adicionar frequência</a>
            <a class="btn btn-primary" href="{{route('business.pdf')}}"> PDF Empresa</a>

        </div>
    </div>
@endsection
