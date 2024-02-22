<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Package;
use App\Models\PackageDefinition;
use App\Models\Student;
use App\Models\StudentCourse;
use App\ViewModels\StudentCourseViewModel;
use App\ViewModels\StudentPackageViewModel;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('student/index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = PackageDefinition::all();
        return view('student/create', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|unique:students,cpf',
            'phone' => 'required|string|max:15',
            'birthday' => 'required|date',
            'package_definition_id' => 'required'
        ]);

        $data = $request->all();
        $student = Student::create($request->all());

        if($student->wasRecentlyCreated){
            $packageDefinition = PackageDefinition::find($data['package_definition_id']);
            $newPackage = new Package();
            $newPackage->student_id = $student->id;
            $newPackage->package_definition_id = $data['package_definition_id'];
            if ($packageDefinition->type == Package::AMOUNT_TYPE) {
                $newPackage->remaining_amount = $packageDefinition->package_amount;
            } else {
                $date = new DateTime();
                $interval = new DateInterval($packageDefinition->package_duration);
                $end_date = $date->add($interval);

                $newPackage->start_date = $date;
                $newPackage->end_date = $end_date;
            }

            $newPackage->save();
        }

        return redirect()->route('student.show', ['student' => $student->id])->with('success', 'Student created successfully');
    }

    public function course(Student $student)
    {
        $studentCourses = StudentCourse::where('student_id', $student->id)->get();
        $studentCourseViewModels = [];
        foreach ($studentCourses as $el) {
            $studentCourseViewModel = new StudentCourseViewModel(
                $student->name,
                ...Course::where('id', $el->course_id)->pluck('course_name')
            );
            $studentCourseViewModels [] = $studentCourseViewModel;
        }

        return view('student/course/index', compact('studentCourseViewModels'));
    }

    public function assign(Student $student)
    {
        $courses = Course::all();
        return view('student/course/assign', ['student' => $student, 'courses' => $courses]);
    }

    public function assignCourse(Request $request, Student $student)
    {
        $request->validate([
            'student_id' => [
                'required',
                Rule::exists('students', 'id'),
            ],
            'course_id' => [
                'required',
                Rule::exists('courses', 'id'),
            ],
        ]);
        $data = $request->all();

        $record = new StudentCourse();
        $record->student_id = $data['student_id'];
        $record->course_id = $data['course_id'];
        $record->save();

        return redirect()->route('student.course.show', compact('student'))->with(['success', 'Student assign to course']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $packages = $student->packages()->get();

        $viewModels = [];
        foreach ($packages as $el) {
            $viewModel = new StudentPackageViewModel(
                $el->student()->first()->name,
                $el->packageDefinition()->first()->type,
                $el->start_date,
                $el->end_date,
                $el->remaining_amount,
                $el->active,
                $el->created_at
            );
            $viewModels[] = $viewModel;
        }

        return view('student/show', ['student' => $student, 'viewModels'=>$viewModels]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student/edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required',
            'phone' => 'required|string|max:15',
            'birthday' => 'required|date',
        ]);

        $student->update($data);

        return redirect()->route('student.show', $student)->with('success', 'Student created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student deleted successfully');
    }
}
