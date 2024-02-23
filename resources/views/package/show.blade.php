@extends('layouts.app')
@section('title', 'Pacotes')

@section('content')
<div>
    <div>
        <p>Nome Aluno: {{ $viewModel->getStudentName() }}</p>
        <p>Tipo de Pacote: {{ $viewModel->getPackageType() }}</p>
        <p>Data de comeco: {{ $viewModel->getPackageStartDate() }}</p>
        <p>Data final: {{ $viewModel->getPackageEndDate() }}</p>
        <p>Quantidade restante: {{ $viewModel->getPackageCurrentAmount() }}</p>
        <p>Ativo: {{ $viewModel->isActive() }}</p>
    </div>
</div>
@endsection
