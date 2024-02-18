<?php

namespace App\Http\Controllers;

use App\Events\AttendanceEvent;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;
use App\ViewModels\AttendanceViewModel;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::all();
        $attendanceViewModels = [];
        foreach ($attendances as $attendance){

            $attendanceViewModel = new AttendanceViewModel(
                $attendance->student()->first()->name,
                $attendance->courses()->first()->course_name,
                $attendance->attendance_date
            );
            $attendanceViewModels[] = $attendanceViewModel;
        }
        return view('attendance/index', compact('attendanceViewModels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('attendance/create', ['students' => $students, 'courses'=> $courses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'student_id' => 'required',
        ]);

        $data = $request->all();
        $attendance = new Attendance();
        $attendance->student_id = $data['student_id'];
        $attendance->course_id = $data['course_id'];

        $attendance->save();
        AttendanceEvent::dispatch($attendance);
        return redirect()->route('attendance.index')->with('success', 'Attendance created successfully');
        // send event
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        $attendanceViewModel = new AttendanceViewModel(
            $attendance->student()->first()->name,
            $attendance->courses()->first()->course_name,
            $attendance->attendance_date
        );

        return view('attendance/show',compact('attendanceViewModel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance.index')->with('success', 'Attendance deleted successfully');
    }
}
