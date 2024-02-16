@include('../default')
<div>
    @if (empty($teacherCourseViewModels))
        <p>No Teacher course relation available.</p>
    @else
        @foreach ($teacherCourseViewModels as $value)
            <div>
                <p>Teacher Name: {{ $value->getTeacherName() }}</p>
                <p>Course Name: {{ $value->getCourseName() }}</p>
            </div>
            <hr>
        @endforeach
    @endif
</div>
