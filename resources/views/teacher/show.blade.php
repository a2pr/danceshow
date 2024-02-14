@include('../default')
<div>
    <div>
        <p>Id: {{ $teacher->id }}</p>
        <p>Name: {{ $teacher->name }}</p>
        <p>cpf: {{ $teacher->cpf }}</p>

        <a href="{{ route('teacher.edit', $teacher) }}">Edit Teacher</a>
        <a href="{{ route('teacher.destroy', $teacher) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
            Delete Teacher
        </a>
        <form id="delete-form" action="{{ route('teacher.destroy', $teacher) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
    <hr>
</div>
