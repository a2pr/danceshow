<!-- resources/views/courses/create.blade.php -->

{{--@extends('layouts.app')--}} <!-- You might need to adjust this based on your layout structure -->

{{--@section('content')--}}
<div class="container">
    <h2>Create Package</h2>
    <form method="post" action="{{ route('package-definition.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <select id="type" name="type">
                <option value="" disabled selected>Select an option</option>
                <option value="amount">Amount Package</option>
                <option value="interval">Interval Package</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="form-group">
            <select id="package_duration" name="package_duration">
                <option value="" disabled selected>Select an option</option>
                <option value="P1M">1 Month</option>
                <option value="P1W">1 Week</option>
                <option value="P2W">2 Week</option>
            </select>
        </div>
        <div class="form-group">
            <label for="package_amount">Package Duration:</label>
            <input type="number" class="form-control" id="package_amount" name="package_amount">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
{{--@endsection--}}
