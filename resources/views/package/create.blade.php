<!-- resources/views/courses/create.blade.php -->

{{--@extends('layouts.app')--}} <!-- You might need to adjust this based on your layout structure -->

{{--@section('content')--}}
    <div class="container">
        <h2>Create Package</h2>
        <form method="post" action="{{ route('package.store') }}">
            @csrf
            <div class="form-group">
                <label for="student_name">Student:</label>
                <input type="text" class="form-control" id="student_name" name="student_name" value="{{$packageCreateDto->getStudentDto()->getName()}}" disabled>
                <input type="hidden" id="student_id" name="student_id" value="{{$packageCreateDto->getStudentDto()->getStudentId()}}">
            </div>
            <div class="form-group">
                <select id="package_definition_id" name="package_definition_id">
                    <option value="" disabled selected>Select an option</option>
                    @foreach ($packageCreateDto->getPackageDefinitions() as $value )
                        <option value="{{ $value->getPackageDefinitionId() }}">{{ $value->allInfo() }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
{{--@endsection--}}
