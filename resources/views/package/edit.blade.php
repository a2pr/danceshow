{{--@extends('layouts.app') <!-- Adjust this based on your layout structure -->--}}

{{--@section('content')--}}
    <div class="container">
        <h2>Edit Course</h2>
        <form method="POST" action="{{ route('package.update', $package) }}">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$viewModel->getStudentName()}}" disabled>
            </div>
            <div class="form-group">

                <label for="type">Package type:</label>

                <input type="text" class="form-control" id="type" name="type" value="{{ $viewModel->isAmountType() ? 'Amount' : 'Interval' }}" disabled>

            </div>
            @if($viewModel->isAmountType())
                <div class="form-group">
                    <label for="remaining_amount">Package Duration:</label>
                    <input type="number" class="form-control" id="remaining_amount" name="remaining_amount" value="{{$package->remaining_amount}}">
                </div>
            @else
                <div class="form-group">
                    <label for="start_date">Start date:</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ empty($package->start_date) ? '': date('Y-m-d',strtotime($package->start_date))}}" disabled>
                </div>
                <div class="form-group">
                    <label for="end_date">End date:</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ empty($package->end_date) ? '': date('Y-m-d',strtotime($package->end_date))}}" required>
                </div>
            @endif
            <div class="form-group">
                <label for="package_active">Active package:</label>
                <input type="checkbox" class="form-control" id="package_active" value="1" name="package_active" {{$package->active ? 'checked' : ''}}  >
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
{{--
@endsection--}}
