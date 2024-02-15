@include('../default')
<div>
    <div>
        <h3>Package definition</h3>
        <p>Id: {{ $packageDefinition->id }}</p>
        <p>Type: {{ $packageDefinition->type }}</p>
        <p>Name: {{ $packageDefinition->name }}</p>
        <p>Description: {{ $packageDefinition->description }}</p>
        <p>Duration: {{ $packageDefinition->package_duration }}</p>
        <p>Amount: {{ $packageDefinition->package_amount }}</p>

        <a href="{{ route('package-definition.edit', $packageDefinition) }}">Edit Package definition</a>
        <a href="{{ route('package-definition.destroy', $packageDefinition) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
            Delete Package definition
        </a>
        <form id="delete-form" action="{{ route('package-definition.destroy', $packageDefinition) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
    <hr>
</div>
