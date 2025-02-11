<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\TeacherMiddleware;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('backend.student.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('teacher-register',[TeacherController::class,'teacher_register'])->name('teacher.register');
Route::post('teacher-store',[TeacherController::class,'teacher_store'])->name('teacher.store');
Route::get('teacher-dashboard',[TeacherController::class,'teacher_dashboard'])->name('teacher.dashboard')->middleware('teacher');
Route::get('teacher-login',[TeacherController::class,'teacher_login'])->name('teacher.login');
Route::post('teacher-login-check',[TeacherController::class,'teacher_check'])->name('teacher.check');
Route::post('teacher-destory',[TeacherController::class,'teacher_destory'])->name('teacher.destory');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';