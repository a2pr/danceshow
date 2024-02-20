@include('../default')
<div>
    <div>
        <p>Frequência data: {{ $attendanceViewModel->getAttendanceDate() }}</p>
        <p>student Nome: {{ $attendanceViewModel->getStudentName() }}</p>
        <p>course Nome: {{ $attendanceViewModel->getCourseName() }}</p>
    </div>
    <hr>
</div>
