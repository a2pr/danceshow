<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserController::class, 'index']);
Route::group(['prefix'=>'student'], function(){
    Route::get('/', [StudentController::class, 'index']);
    Route::post('/', [StudentController::class, 'store'])->name('student.store');
    Route::get('/create', [StudentController::class, 'create']);
    Route::get('/update/{student}', [StudentController::class, 'edit'])->name('student.edit');
    Route::get('/{student}', [StudentController::class, 'show'])->name('student.show');
    Route::put('/{student}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
});
