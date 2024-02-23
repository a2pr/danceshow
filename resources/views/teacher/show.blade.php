@include('../default')
<div>
    <div>
        <p>Nome: {{ $teacher->name }}</p>
        <p>cpf: {{ $teacher->cpf }}</p>

        <a href="{{ route('teacher.edit', $teacher) }}">Editar Professor</a>
        <a href="{{ route('teacher.destroy', $teacher) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
            Apagar Professor
        </a>
        <form id="delete-form" action="{{ route('teacher.destroy', $teacher) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
    <hr>
</div>
