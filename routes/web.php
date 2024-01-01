<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DosenController as AdminDosenController;
use App\Http\Controllers\Admin\MahasiswaController as AdminMahasiswaController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\TaskController as AdminTaskController;
use App\Http\Controllers\Admin\AssignmentController as AdminAssignmentController;
use App\Http\Controllers\Dosen\DosenController as DosenDosenController;
use App\Http\Controllers\Dosen\TaskController as DosenTaskController;
use App\Http\Controllers\Dosen\CourseController as DosenCourseController;
use App\Http\Controllers\Dosen\AssignmentController as DosenAssignmentController;
use App\Http\Controllers\Mahasiswa\CourseController as MahasiswaCourseController;
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
    return redirect('/login');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/testing', function () {
    return view('admin.layout.app');
});

Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:mahasiswa'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'mahasiswaHome'])->name('home');
    
    Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
        Route::get('course/{id}/',[MahasiswaCourseController::class, 'viewCourse'])->name('viewCourse');
        Route::get('task/{id}/',[MahasiswaCourseController::class, 'viewTask'])->name('viewTask');
        Route::put('assignmentSubmit/{id}/',[MahasiswaCourseController::class, 'assignmentSubmit'])->name('assignmentSubmit');
    });
});
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('dosen', AdminDosenController::class);
        Route::resource('mahasiswa', AdminMahasiswaController::class);
        Route::resource('courses', AdminCourseController::class);
        //this id is from course
        Route::get('/viewTasks/{id}',[AdminTaskController::class, 'viewTask'])->name('viewTask');
        Route::get('/addTask/{id}',[AdminTaskController::class, 'addTask'])->name('addTask');
        Route::post('/storeTask/{id}',[AdminTaskController::class, 'storeTask'])->name('storeTask');
        Route::delete('/deleteTask/{id}',[AdminTaskController::class, 'deleteTask'])->name('deleteTask');

        Route::prefix('tasks')->name('tasks.')->group(function () {
            Route::get('/{id}/assignments',[AdminAssignmentController::class, 'index'])->name('assignment');
            Route::prefix('assignments')->name('assignments.')->group(function () {
                Route::get('/{id}',[AdminAssignmentController::class, 'show'])->name('view');
                Route::put('/{id}/grade',[AdminAssignmentController::class, 'grade'])->name('grade');
            });
        });
        //Route::resource('tasks', AdminTaskController::class);
    });
});
Route::middleware(['auth', 'user-access:dosen'])->group(function () {
    Route::get('/dosen/home', [HomeController::class, 'dosenHome'])->name('dosen.home');
    Route::prefix('dosen')->name('dosen.')->group(function () {
        Route::get('course/{id}/',[DosenTaskController::class, 'index'])->name('viewTask');
        Route::get('task/{id}/assignments/',[DosenAssignmentController::class, 'index'])->name('viewAssignments');
        Route::get('task/assignments/{id}/',[DosenAssignmentController::class, 'show'])->name('showAssignment');
        Route::get('course/{id}/addTask/',[DosenTaskController::class, 'create'])->name('tasks.create');
        Route::post('course/{id}/storeTask/',[DosenTaskController::class, 'store'])->name('tasks.store');
        // Route::resource('tasks', DosenTaskController::class)->except('index');
        Route::resource('courses', DosenCourseController::class)->except('index');
        Route::put('/{id}/grade',[DosenAssignmentController::class, 'grade'])->name('grade');
    });
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
