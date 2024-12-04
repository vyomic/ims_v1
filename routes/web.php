<?php
use App\Http\Controllers\Institute\InstituteController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Admin\Dashboard;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [Dashboard::class, 'mainHandle'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // institute cerations
    Route::get('/reg', [InstituteController::class, 'regForm'])->name('regInstitute');
    Route::post('/reg', [InstituteController::class, 'store'])->name('createInstitute');

     // Staff routes
     Route::get('staff/add', [StaffController::class, 'create'])->name('admin.staff.add');
     Route::get('staff/view', [StaffController::class, 'read'])->name('admin.staff.view');
     Route::get('staff/report', [StaffController::class, 'report'])->name('admin.staff.report');
     
     // Teacher routes
     Route::get('teacher/add', [Dashboard::class, 'mainHandle'])->name('admin.teacher.add');
     Route::post('teacher/add', [TeacherController::class, 'create'])->name('teacher.create');

     Route::get('teacher/view', [Dashboard::class, 'mainHandle'])->name('admin.teacher.view');
     Route::get('teacher/report', [Dashboard::class, 'mainHandle'])->name('admin.teacher.report');
     
     // Student routes
     Route::get('student/admit', [StudentController::class, 'create'])->name('admin.student.admit');
     Route::get('student/view', [StudentController::class, 'read'])->name('admin.student.view');
     Route::get('student/report', [StudentController::class, 'report'])->name('admin.student.report');


});

require __DIR__.'/auth.php';
