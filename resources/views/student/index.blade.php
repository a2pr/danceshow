<div>
    @if ($students->isEmpty())
        <p>No students available.</p>
    @else
        @foreach ($students as $student)
            <div>
                <p>Id: {{ $student->id }}</p>
                <p>Name: {{ $student->name }}</p>
                <p>cpf: {{ $student->cpf }}</p>
            </div>
            <hr>
        @endforeach
    @endif
</div>
