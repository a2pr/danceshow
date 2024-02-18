@extends('layouts.app')
@section('title', 'Students Page')

@section('content')
<div>
    <h2>Packages </h2>
    <div class="row">
    @if (empty($viewModels))
        <p>No packages definition available.</p>
    @else
        @foreach ($viewModels as $viewModel)
            <div class="col-4 mb-3">
                <div class="card">
                    <div class="card-boy">
                        <p>Student name: {{ $viewModel->getStudentName() }}</p>
                        <p>package type: {{ $viewModel->getPackageType() }}</p>
                        @if($viewModel->isAmountType())
                            <p>Remaining amount: {{ $viewModel->getPackageCurrentAmount() }}</p>
                            <p>Notes: {{ $viewModel->getNotes() ?? 'No notes'}}</p>
                        @else
                            <p>Start Date: {{ $viewModel->getPackageStartDate() }}</p>
                            <p>End Date: {{ $viewModel->getPackageEndDate() }}</p>
                        @endif
                        <p>Status: {{ $viewModel->isActive() ? 'Activo': 'Desactivado'}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    </div>
</div>
@endsection
