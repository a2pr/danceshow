@include('../default')
<p>Id: {{ $student->id }}</p>
<p>Nome: {{ $student->name }}</p>
<p>cpf: {{ $student->cpf }}</p>

<h3>Aulas</h3>
@if ($courses->isEmpty())
    <p>Sem aula disponivel</p>
@else
    @foreach ($courses as $course)
        <div>
            <p>Nome de Aula: {{ $course->course_name }}</p>
        </div>

        <form method="POST" action="{{ route('student.course.assign',$student) }}">
            @csrf <!-- Add CSRF token for security -->

            <input type="hidden" name="student_id" value="{{ $student->id }}">
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <button type="submit">Atribuir aula para aluno</button>
        </form>
        <hr>

    @endforeach
@endif
