@extends('layouts.app')
@section('title', 'Aulas Page')

@section('content')
    <div class="container">
        <h2>Create Student</h2>
        <div class="col-6">
            <form method="post" action="{{ route('student.store') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">Nome:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="birthday">Date of Birth:</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" required>
                </div>
                @if ($packages->isEmpty())
                    <p>No course available.</p>
                @else
                    <div class="form-group">
                        <label class="form-label" for="package_definition_id">Package:</label>
                        <select id="package_definition_id" name="package_definition_id" class="form-control">
                            <option value="" disabled selected>Select an option</option>
                            @foreach ($packages as $package )
                                <option value="{{ $package->id }}">{{ $package->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <br/>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
