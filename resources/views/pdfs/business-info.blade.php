<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>

<h2>Estatisticas alunos</h2>
<div>

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
    <hr/>
    <h3>Alunos com pacotes de aulas expirando</h3>
    @foreach($studentWithPackagesEndingSoon as $value)
        <ul>
            <li>Nome de alunos: {{$value['student_name']}}</li>
            <li>Pacote: {{$value['package_name']}}</li>
            <li>Aulas restantes: {{$value['remaining_amount']}}</li>
        </ul>
    @endforeach
    <hr/>
    <h3 class="card-title">Alunos com pacotes com intervalo expirando no mes
        atual: {{ \Carbon\Carbon::now()->format('F Y') }}</h3>
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

<hr/>
<h2>Estatisticas pacotes</h2>

@foreach ($packageDefinitionStats['packages'] as $index => $el)
    Package Name: {{$index}}
    <br/>Count: {{$el['count']}}
    <br/>Type: {{$el['type']}}
    <br/><br/>
@endforeach

<hr/>
<h2>Estatistica courses</h2>
<div>
    <h4>Desde o comeco</h4>
    <span>Aula com mas frecuencia: {{$courseStats['max']['course_name']}}</span>
    <br/>
    <span>Aula com menos frecuencia: {{$courseStats['min']['course_name']}}</span>
    <h4>No atual mes:</h4>

    <span>Aula com mas frecuencia: {{$courseStats['current_month']['max']['course_name']}}</span>
    <br/>
    <span>Aula com menos frecuencia: {{$courseStats['current_month']['min']['course_name']}}</span>
</div>
</body>
</html>
