@include('../default')
<div>
    <div>
        <p>Nome da Aula: {{ $course->course_name }}</p>

        <a href="{{ route('course.edit', $course) }}">Editar Aula</a>
        <a href="{{ route('course.destroy', $course) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
            Apagar Aula
        </a>
        <form id="delete-form" action="{{ route('course.destroy', $course) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
    <hr>
</div>
