@include('../default')
<div>
    @if (empty($viewModels))
        <p>No packages definition available.</p>
    @else
        @foreach ($viewModels as $viewModel)
            <div>
                <p>Student name: {{ $viewModel->getStudentName() }}</p>
                <p>package type: {{ $viewModel->getPackageType() }}</p>
                <p>Start Date: {{ $viewModel->getPackageStartDate() }}</p>
                <p>End Date: {{ $viewModel->getPackageEndDate() }}</p>
                <p>Remaining amount: {{ $viewModel->getPackageCurrentAmount() }}</p>
                <p>Active: {{ $viewModel->isActive() }}</p>
            </div>
            <hr>
        @endforeach
    @endif
</div>
