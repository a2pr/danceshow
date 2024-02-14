@include('../default')
<div>
    <div>
        <p>Id: {{ $course->id }}</p>
        <p>Name: {{ $course->course_name }}</p>

        <a href="{{ route('course.edit', $course) }}">Edit Course</a>
        <a href="{{ route('course.destroy', $course) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
            Delete Course
        </a>
        <form id="delete-form" action="{{ route('course.destroy', $course) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
    <hr>
</div>
