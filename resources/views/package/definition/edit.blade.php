{{--@extends('layouts.app') <!-- Adjust this based on your layout structure -->--}}

{{--@section('content')--}}
    <div class="container">
        <h2>Edit Course</h2>
        <form method="POST" action="{{ route('package-definition.update',$packageDefinition) }}">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$packageDefinition->name}}" required>
            </div>
            <div class="form-group">
                <select id="type" name="type">
                    <option value="" disabled selected>Select an option</option>
                    <option value="amount" {{ $packageDefinition->type == 'amount' ? 'selected' : '' }}>Amount Package</option>
                    <option value="interval" {{ $packageDefinition->type == 'interval' ? 'selected' : '' }}>Interval Package</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description" value="{{$packageDefinition->description}}"  required>
            </div>
            <div class="form-group">
                <select id="package_duration" name="package_duration">
                    <option value="" disabled selected>Select an option</option>
                    <option value="P1M" {{ $packageDefinition->package_duration == 'P1M' ? 'selected' : '' }}>1 Month</option>
                    <option value="P1W" {{ $packageDefinition->package_duration == 'P1W' ? 'selected' : '' }}>1 Week</option>
                    <option value="P2W" {{ $packageDefinition->package_duration == 'P2W' ? 'selected' : '' }}>2 Week</option>
                </select>
            </div>
            <div class="form-group">
                <label for="package_amount">Package Duration:</label>
                <input type="number" class="form-control" id="package_amount" name="package_amount" value="{{$packageDefinition->package_amount}}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
{{--
@endsection--}}
