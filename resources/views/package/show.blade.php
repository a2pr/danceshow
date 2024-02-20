@include('../default')
<div>
    <div>
        <p>Student Nome: {{ $viewModel->getStudentName() }}</p>
        <p>package type: {{ $viewModel->getPackageType() }}</p>
        <p>Start Date: {{ $viewModel->getPackageStartDate() }}</p>
        <p>End Date: {{ $viewModel->getPackageEndDate() }}</p>
        <p>Remaining amount: {{ $viewModel->getPackageCurrentAmount() }}</p>
        <p>Active: {{ $viewModel->isActive() }}</p>
    </div>
</div>
