<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeacherCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
/*    public function index()
    {

    }*/

    /**
     * Show the form for creating a new resource.
     */
    public function create(Teacher $teacher)
    {
        $courses = Course::all();
        return view('teacher/course_create', ['teacher'=> $teacher, 'courses'=>$courses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => [
                'required',
                Rule::exists('teachers', 'id'),
            ],
            'course_id' => [
                'required',
                Rule::exists('courses', 'id'),
            ],
        ]);

        $data = $request->all();
        $record = TeacherCourse::where('teacher_id', $data['teacher_id'])
        ->where('course_id', $data['course_id'])->first();

        if(empty($record)){
            $teacherCourse = new TeacherCourse();
            $teacherCourse->teacher_id = $data['teacher_id'];
            $teacherCourse->course_id = $data['course_id'];
            $teacherCourse->save();
            $message = ['success', 'Course assign to teacher successfully'];
        }else{
            $message = ['warning', 'Course already assigned to teacher.'];

        }

        $teacher = Teacher::find($data['teacher_id']);
        return redirect()->route('teacher.show', compact('teacher'))->with(...$message);
    }

    /**
     * Display the specified resource.
     */
/*    public function show(string $id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     */
/*    public function edit(string $id)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     */
/*    public function update(Request $request, string $id)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     */
/*    public function destroy(string $id)
    {
        //
    }*/
}
