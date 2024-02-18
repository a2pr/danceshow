@include('../default')
<div>
    @if (empty($attendanceViewModels))
        <p>No Attendance available.</p>
    @else
        @foreach ($attendanceViewModels as $attendanceViewModel)
            <div>
                <p>Attendance date: {{ $attendanceViewModel->getAttendanceDate() }}</p>
                <p>student name: {{ $attendanceViewModel->getStudentName() }}</p>
                <p>course name: {{ $attendanceViewModel->getCourseName() }}</p>
            </div>
            <hr>
        @endforeach
    @endif
</div>
