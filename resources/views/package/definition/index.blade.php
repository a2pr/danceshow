@extends('layouts.app')
@section('title', 'Students Page')

@section('content')
    <div>
        <h3>Package Stats</h3>
        <div class="row">

            <div class="col mb-3">
                <div class="card">
                    <div class="card-boy">
                        @foreach ($packageDefinitionStats['packages'] as $index => $el)
                        Package Name: {{$index}}
                            <br/>Count: {{$el['count']}}
                            <br/>Type: {{$el['type']}}
                            <br/><br/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <h3>Package Definition</h3>
        <div class="row">
            @if ($packageDefinitions->isEmpty())
                <p>No packages definition available.</p>
            @else
                @foreach ($packageDefinitions as $packageDefinition)

                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-boy">
                                <p>Type: {{ $packageDefinition->type }}</p>
                                <p>Name: {{ $packageDefinition->name }}</p>
                                <p>Description: {{ $packageDefinition->description }}</p>
                                <p>Package Duration: {{ $packageDefinition->package_duration }}</p>
                                <p>Package Amount: {{ $packageDefinition->package_amount}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
