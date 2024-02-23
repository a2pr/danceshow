@include('../default')
<div>
    @if ($teachers->isEmpty())
        <p>Nenhum professor disponivel.</p>
    @else
        @foreach ($teachers as $teacher)
            <div>
                <p>Nome: {{ $teacher->name }}</p>
                <p>cpf: {{ $teacher->cpf }}</p>
            </div>
            <hr>
        @endforeach
    @endif
</div>
