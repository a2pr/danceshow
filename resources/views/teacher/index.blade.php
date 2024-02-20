@include('../default')
<div>
    @if ($teachers->isEmpty())
        <p>No Teachers available.</p>
    @else
        @foreach ($teachers as $teacher)
            <div>
                <p>Id: {{ $teacher->id }}</p>
                <p>Nome: {{ $teacher->name }}</p>
                <p>cpf: {{ $teacher->cpf }}</p>
            </div>
            <hr>
        @endforeach
    @endif
</div>
