@extends('layouts.app')
@section('title', 'Home Page')

@section('content')
    <div class="container-fluid">
        <h2>Dashboard</h2>
        <hr/>
        <h3>Alunos Estatisticas</h3>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                        <ul>
                            <li>Total Alunos: {{$studentsData['all']}}</li>
                            <li>Alunos Ativos: {{$studentsData['active']}}</li>
                            <li>Alunos Inativos: {{$studentsData['inactive']}}</li>
                            <li>Alunos sem pacotes: {{$studentsData['without']}}</li>
                        </ul>
                        <ul>
                            <li>Pacotes por intervalo: {{$studentsData['package_type']['interval']}}</li>
                            <li>Pacotes por aula: {{$studentsData['package_type']['amount']}}</li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4">
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
            </div>
            <div class="col-4">
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
            </div>
        </div>
    </div>
    <p>This is the home page content.</p>
@endsection
