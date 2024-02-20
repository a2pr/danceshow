@extends('layouts.app')
@section('title', 'Alunos Page')

@section('content')
    <div>
        <h2>Packages </h2>
        <div class="row">
            @if (empty($viewModels))
                <p>No packages definition available.</p>
            @else
                @include('package/layouts/packages', ['viewModel' => $viewModels])
            @endif

    </div>
</div>
@endsection
