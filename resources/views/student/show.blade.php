<div>
    <div>
        <p>Id: {{ $student->id }}</p>
        <p>Name: {{ $student->name }}</p>
        <p>cpf: {{ $student->cpf }}</p>

        <a href="{{ route('student.edit', $student) }}">Edit Student</a>
        <a href="{{ route('student.destroy', $student) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
            Delete Student
        </a>
        <form id="delete-form" action="{{ route('student.destroy', $student) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
    <hr>
</div>
