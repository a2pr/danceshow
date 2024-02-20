<?php

namespace App\Http\Controllers;

use App\Facades\CourseFacade;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public $facade;

    public function __construct()
    {
        $this->facade = new CourseFacade();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();

        $courseStat = $this->facade ->getCoursesStats();
        //dd($courseStat);
        return view('course/index', compact('courses', 'courseStat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
        ]);

        $course = Course::create($request->all());

        return redirect()->route('course.show', ['course' => $course->id])->with('success', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('course/show', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('course/edit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'course_name' => 'required|string|max:255',
        ]);

        $course->update($data);

        return redirect()->route('course.show', $course)->with('success', 'Course created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('course.index')->with('success', 'Course deleted successfully');
    }
}
