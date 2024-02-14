@include('../default')
<div>
    @if ($packageDefinitions->isEmpty())
        <p>No packages definition available.</p>
    @else
        @foreach ($packageDefinitions as $packageDefinition)
            <div>
                <p>Id: {{ $packageDefinition->id }}</p>
                <p>Type: {{ $packageDefinition->type }}</p>
                <p>Name: {{ $packageDefinition->name }}</p>
                <p>Description: {{ $packageDefinition->description }}</p>
                <p>Package Duration: {{ $packageDefinition->package_duration }}</p>
                <p>Package Amount: {{ $packageDefinition->package_amount }}</p>
            </div>
            <hr>
        @endforeach
    @endif
</div>
