<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\CourseController;
use  App\Http\Controllers\StaffController;
use  App\Http\Controllers\StudentController;
use  App\Http\Controllers\CartificatesController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('Manage/Course',[CourseController::class, 'index']);
Route::get('Course',[CourseController::class, 'createCourse'])->name('course.add');
Route::get('Manage/Course_type',[CourseController::class, 'Coursetype'])->name('course.type');
Route::post('create/Course',[CourseController::class, 'store'])->name('save.course');
Route::post('delete/Course',[CourseController::class, 'deletecourse'])->name('delete.course');

Route::get('Manage/Staff',[StaffController::class, 'index']);
Route::get('Staff',[StaffController::class, 'addstaff'])->name('staff.add');
// Route::get('Staff',[StaffController::class, 'importstudent']);
Route::post('create/Staff',[StaffController::class, 'savestaff'])->name('save.staff');
Route::post('delete/Staff',[StaffController::class, 'deletestaff'])->name('delete.staff');
Route::get('edit/staff/{id}',[StaffController::class, 'editstaff'])->name('staff.edit');
Route::post('update/staff/data',[StaffController::class,'Update'])->name('update.staff');

Route::get('Manage/Student',[StudentController::class, 'index']);
Route::get('Students',[StudentController::class, 'createStudent'])->name('create.student');
Route::post('create/Student',[StudentController::class, 'saveStudent'])->name('save.student');
Route::post('delete/Student',[StudentController::class, 'deletestudent'])->name('delete.student');


Route::get('Manage/Cartificates',[CartificatesController::class, 'index']);
Route::get('import',[CartificatesController::class,'ImportPage']);
Route::post('import/students',[CartificatesController::class,'import']);


});
