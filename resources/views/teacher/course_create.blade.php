@include('../default')
<p>Nome: {{ $teacher->name }}</p>
<p>cpf: {{ $teacher->cpf }}</p>

<h3>Aulas</h3>
@if ($courses->isEmpty())
    <p>Nenhuma aula disponivel.</p>
@else
    @foreach ($courses as $course)
        <div>
            <p>Nome de Aula: {{ $course->course_name }}</p>
        </div>

        <form method="POST" action="{{ route('teacher.course.store') }}">
            @csrf <!-- Add CSRF token for security -->

            <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <button type="submit">Atribuir aula</button>
        </form>
        <hr>

    @endforeach
@endif
