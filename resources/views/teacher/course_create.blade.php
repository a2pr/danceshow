@include('../default')
<p>Id: {{ $teacher->id }}</p>
<p>Name: {{ $teacher->name }}</p>
<p>cpf: {{ $teacher->cpf }}</p>

<h3>Courses</h3>
@if ($courses->isEmpty())
    <p>No course available.</p>
@else
    @foreach ($courses as $course)
        <div>
            <p>Course Name: {{ $course->course_name }}</p>
        </div>

        <form method="POST" action="{{ route('teacher.course.store') }}">
            @csrf <!-- Add CSRF token for security -->

            <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <button type="submit">Assign course to teacher</button>
        </form>
        <hr>

    @endforeach
@endif
