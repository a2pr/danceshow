@extends('layouts.app')
@section('title', 'Alunos Page')

@section('content')
    <div>
{{--        <h3>Estatisticas Pacotes</h3>
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
        </div>--}}
        <h3>Definição de pacotes</h3>
        <div class="row">
            @if (empty($packageDefinitionsViewModel))
                <p>No pacotes disponiveis.</p>
            @else
                @foreach ($packageDefinitionsViewModel as $packageViewModel)

                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-boy">
                                <p>Tipo: {{ $packageViewModel->getType() }}</p>
                                <p>Nome: {{ $packageViewModel->getName() }}</p>
                                <p>Descrição: {{ $packageViewModel->getDescription() }}</p>
                                @if($packageViewModel->type == 'amount')
                                    <p>Quantidade de aulas: {{ $packageViewModel->getQuantity()}}</p>
                                @else
                                    <p>Duração do pacote: {{ $packageViewModel->getDuration() }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
