@include('../default')
<div>
    <div>
        <p>Attendance date: {{ $attendanceViewModel->getAttendanceDate() }}</p>
        <p>student name: {{ $attendanceViewModel->getStudentName() }}</p>
        <p>course name: {{ $attendanceViewModel->getCourseName() }}</p>
    </div>
    <hr>
</div>
