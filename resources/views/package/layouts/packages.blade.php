@foreach ($viewModels as $viewModel)
    <div class="col-4 mb-3">
        <div class="card">
            @include('package/layouts/package', ['viewModel' => $viewModel])
        </div>
    </div>
@endforeach
