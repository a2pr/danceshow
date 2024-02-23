@extends('layouts.app')
@section('title', 'Alunos Page')

@section('content')
<div>
    @if ($packages->isEmpty())
        <p>Nenhuma definiçao de pacote disponivel</p>
    @else
        @foreach ($packages as $package)
            <div>
                <p>Id: {{ $package->id }}</p>
                <p>Data de começo: {{ $package->start_date ?? 'NULL' }}</p>
                <p>Data final: {{ $package->end_date ?? 'NULL'}}</p>
                <p>Quantidade restante: {{ $package->remaining_amount ?? 'NULL'}}</p>
                <p>Ativo: {{ $package->active }}</p>
            </div>
            <hr>
        @endforeach
    @endif
</div>
@endsection
