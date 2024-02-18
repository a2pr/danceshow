@include('../default')
<p>Id: {{ $student->id }}</p>
<p>Name: {{ $student->name }}</p>
<p>cpf: {{ $student->cpf }}</p>

<h3>Courses</h3>
@if ($courses->isEmpty())
    <p>No course available.</p>
@else
    @foreach ($courses as $course)
        <div>
            <p>Course Name: {{ $course->course_name }}</p>
        </div>

        <form method="POST" action="{{ route('student.course.assign',$student) }}">
            @csrf <!-- Add CSRF token for security -->

            <input type="hidden" name="student_id" value="{{ $student->id }}">
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <button type="submit">Assign course to student</button>
        </form>
        <hr>

    @endforeach
@endif
