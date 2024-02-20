@extends('layouts.app')
@section('title', 'Alunos Page')

@section('content')
    <div>
        <h3>Estatisticas Pacotes</h3>
        <div class="row">

            <div class="col mb-3">
                <div class="card">
                    <div class="card-boy">
                        @foreach ($packageDefinitionStats['packages'] as $index => $el)
                        Pacote: {{$index}}
                            <br/>Quantidade: {{$el['count']}}
                            <br/>Tipo: {{$el['type']}}
                            <br/><br/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <h3>Definição de pacotes</h3>
        <div class="row">
            @if ($packageDefinitions->isEmpty())
                <p>No pacotes disponiveis.</p>
            @else
                @foreach ($packageDefinitions as $packageDefinition)

                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-boy">
                                <p>Tipo: {{ $packageDefinition->type }}</p>
                                <p>Nome: {{ $packageDefinition->name }}</p>
                                <p>Descrição: {{ $packageDefinition->description }}</p>
                                @if($packageDefinition->type == 'amount')
                                    <p>Quantidade de aulas: {{ $packageDefinition->package_amount}}</p>
                                @else
                                    <p>Duração do pacote: {{ $packageDefinition->package_duration }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
