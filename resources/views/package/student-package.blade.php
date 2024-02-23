@extends('layouts.app')
@section('title', 'Alunos Page')

@section('content')
    <div>
        <h2>Pacote </h2>
        <div class="row">
            @if (empty($viewModels))
                <p>Nenhum definiçao de pacote disponivel.</p>
            @else
                @include('package/layouts/packages', ['viewModel' => $viewModels])
            @endif

    </div>
</div>
@endsection
