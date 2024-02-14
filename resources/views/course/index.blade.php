<div>
    @if ($courses->isEmpty())
        <p>No students available.</p>
    @else
        @foreach ($courses as $course)
            <div>
                <p>Id: {{ $course->id }}</p>
                <p>Course Name: {{ $course->course_name }}</p>
            </div>
            <hr>
        @endforeach
    @endif
</div>
