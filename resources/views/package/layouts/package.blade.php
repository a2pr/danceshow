<div class="card">
    <div class="card-boy">
        <p>Student Nome: {{ $viewModel->getStudentName() }}</p>
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
