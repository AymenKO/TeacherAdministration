<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveController;

//Admin Controllers
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\GroupController;

//Teacher Controllers
use App\Http\Controllers\Teacher\CourseController;
use App\Http\Controllers\Teacher\GradeController;





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

Route::get('/dashboard', function () {
    if (auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('teacher.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\Admin\AdminDashboardController;

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');


    // Add other admin routes here

    Route::prefix('admin/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });


    Route::prefix('admin/departments')->group(function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('admin.departments.index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('admin.departments.create');
        Route::post('/', [DepartmentController::class, 'store'])->name('admin.departments.store');
        Route::get('/{department}/edit', [DepartmentController::class, 'edit'])->name('admin.departments.edit');
        Route::put('/{department}', [DepartmentController::class, 'update'])->name('admin.departments.update');
        Route::delete('/{department}', [DepartmentController::class, 'destroy'])->name('admin.departments.destroy');
    });


    Route::prefix('admin/groups')->group(function () {
        Route::get('/', [GroupController::class, 'index'])->name('admin.groups.index');
        Route::get('/create', [GroupController::class, 'create'])->name('admin.groups.create');
        Route::post('/', [GroupController::class, 'store'])->name('admin.groups.store');
        Route::get('/{group}/edit', [GroupController::class, 'edit'])->name('admin.groups.edit');
        Route::put('/{group}', [GroupController::class, 'update'])->name('admin.groups.update');
        Route::delete('/{group}', [GroupController::class, 'destroy'])->name('admin.groups.destroy');
    });


    Route::get('/admin/leaves', [LeaveController::class, 'adminIndex'])->name('admin.leaves.index');
    Route::post('/admin/leaves/{id}/accept', [LeaveController::class, 'accept'])->name('admin.leaves.accept');
    Route::post('/admin/leaves/{id}/reject', [LeaveController::class, 'reject'])->name('admin.leaves.reject');
    Route::get('/admin/leaves/history', [LeaveController::class, 'adminHistory'])->name('admin.leaves.history');


});
use App\Http\Controllers\Teacher\TeacherDashboardController;

Route::middleware(['auth', 'verified', 'teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard');
    Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'dashboard'])->name('teacher.dashboard');

    Route::prefix('teacher/courses')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('teacher.courses.index');
        Route::get('/create', [CourseController::class, 'create'])->name('teacher.courses.create');
        Route::post('/', [CourseController::class, 'store'])->name('teacher.courses.store');
        Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('teacher.courses.edit');
        Route::put('/{course}', [CourseController::class, 'update'])->name('teacher.courses.update');
        Route::delete('/{course}', [CourseController::class, 'destroy'])->name('teacher.courses.destroy');
    });


    Route::prefix('teacher/grades')->group(function () {
        Route::get('/', [GradeController::class, 'index'])->name('teacher.grades.index');
        Route::get('/create', [GradeController::class, 'create'])->name('teacher.grades.create');
        Route::post('/', [GradeController::class, 'store'])->name('teacher.grades.store');
        Route::get('/{grade}/edit', [GradeController::class, 'edit'])->name('teacher.grades.edit');
        Route::put('/{grade}', [GradeController::class, 'update'])->name('teacher.grades.update');
        Route::delete('/{grade}', [GradeController::class, 'destroy'])->name('teacher.grades.destroy');
    });


    Route::get('/teacher/leaves/apply', [LeaveController::class, 'create'])->name('teacher.leaves.create');
    Route::post('/teacher/leaves', [LeaveController::class, 'store'])->name('teacher.leaves.store');
    Route::get('/teacher/leaves', [LeaveController::class, 'index'])->name('teacher.leaves.index');


});