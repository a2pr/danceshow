<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\PackagesDefinitionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherCourseController;
use App\Http\Controllers\UserController;
use App\Models\Package;
use App\Models\PackageDefinition;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/user', [UserController::class, 'index']);
Route::group(['prefix'=>'student'], function(){
    Route::get('/', [StudentController::class, 'index']);
    Route::post('/', [StudentController::class, 'store'])->name('student.store');
    Route::get('/create', [StudentController::class, 'create']);
    Route::get('/update/{student}', [StudentController::class, 'edit'])->name('student.edit');
    Route::get('/{student}', [StudentController::class, 'show'])->name('student.show');
    Route::put('/{student}', [StudentController::class, 'update'])->name('student.update');
    Route::get('/{student}/packages', [StudentController::class, 'packages'])->name('student.packages');
    Route::get('/{student}/course/create', [StudentController::class, 'assign'])->name('student.course.create');
    Route::post('/{student}/course/create', [StudentController::class, 'assignCourse'])->name('student.course.assign');
    Route::get('/{student}/course/', [StudentController::class, 'course'])->name('student.course.show');
    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
});

Route::resource('attendance', AttendanceController::class);
Route::resource('teacher', TeacherController::class);
Route::resource('course', CourseController::class);

Route::resource('package', PackagesController::class);
Route::get('package/create/student/{student}', [PackagesController::class, 'create']);
Route::resource('package-definition', PackagesDefinitionController::class);

Route::get('/teacher/course/all', [TeacherCourseController::class, 'index'])->name('teacher.course.index');
Route::get('/teacher/course/create/{teacher}', [TeacherCourseController::class, 'create']);
Route::post('/teacher/course/', [TeacherCourseController::class, 'store'])->name('teacher.course.store');
