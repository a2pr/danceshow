<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<h1>Estatisticas date: {{$currentDate}}</h1>
<div style="margin-left: 2rem; margin-right: 2rem">
    <h2>Alunos</h2>
    <ul>
        <li>Total Alunos: {{$studentsData['all']}}</li>
        <li>Alunos Ativos: {{$studentsData['active']}}</li>
        <li>Alunos Inativos: {{$studentsData['inactive']}}</li>
        <li>Alunos sem pacotes: {{$studentsData['without']}}</li>
        <li>Alunos adicionados no mes: {{$studentsCreatedCurrentMonth}}</li>
        <li>Pacotes por intervalo: {{$studentsData['package_type']['interval']}}</li>
        <li>Pacotes por aula: {{$studentsData['package_type']['amount']}}</li>
    </ul>
    <h3>Alunos com pacotes de aulas expirando</h3>
    @foreach($studentWithPackagesEndingSoon as $value)
        <ul>
            <li>Nome de alunos: {{$value['student_name']}}</li>
            <li>Pacote: {{$value['package_name']}}</li>
            <li>Aulas restantes: {{$value['remaining_amount']}}</li>
        </ul>
    @endforeach
    <h3 class="card-title">Alunos com pacotes com intervalo expirando no mes
        atual: {{ $currentMonthYear}}</h3>
    <div class="card-text">
        @foreach($studentWithPackagesEndingCurrentMonth as $value)
            <ul>
                <li>Nome de alunos: {{$value['student_name']}}</li>
                <li>Pacote: {{$value['package_name']}}</li>
                <li>Data de expiração : {{$value['end_date']}}</li>
            </ul>
        @endforeach
    </div>

    <hr/>
    <h2>Estatisticas pacotes</h2>

    @foreach ($packageDefinitionStats['packages'] as $index => $el)
        Pacote: {{$index}}
        <br/>Quantidade: {{$el['count']}}
        <br/>Tipo: {{$el['type']}}
        <br/><br/>
    @endforeach

    <hr/>
    <h2>Estatisticas Aulas</h2>
    <div>
        <h4>Desde o começo</h4>
        <span>Aula com mas frequência: {{$courseStats['max']['course_name']}}</span>
        <br/>
        <span>Aula com menos frequência: {{$courseStats['min']['course_name']}}</span>
        <h4>No atual mes:</h4>

        <span>Aula com mas frequência: {{$courseStats['current_month']['max']['course_name']}}</span>
        <br/>
        <span>Aula com menos frequência: {{$courseStats['current_month']['min']['course_name']}}</span>
    </div>
</div>

</body>
</html>
