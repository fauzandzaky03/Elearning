<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Models\Courses;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan teks

Route::get('/salam', function(){
    return "Assalamualaikum....";
});

Route::get('/profile', function (){
    return view('profile');
});

Route::get('admin/dashboard', [DashboardController::class, 'index']);

// Route untuk menampilkan halaman student
Route::get('/admin/student', [StudentController::class, 'index']);
// untuk create
Route::get('/admin/student/create', [StudentController::class, 'create']);

// untuk simpan
Route::post('/admin/student/store', [StudentController::class, 'store']);

// untuk menampilkan edit
Route::get('/admin/student/edit/{id}', [StudentController::class, 'edit']);

// untuk menyimpan update
Route::put('/admin/student/update/{id}', [StudentController::class, 'update']);

// untuk hapus student
Route::delete('/admin/student/delete/{id}', [StudentController::class, 'destroy']);
 
// untuk menampilkan student
Route::get('/admin/courses', [CoursesController::class, 'index']);

// untuk create
Route::get('/admin/courses/create', [CoursesController::class, 'create']);

// untuk simpan
Route::post('/admin/courses/store', [CoursesController::class, 'store']);

// untuk menampilkan edit
Route::get('/admin/courses/edit/{id}', [CoursesController::class, 'edit']);

// untuk menyimpan update
Route::put('/admin/courses/update/{id}', [CoursesController::class, 'update']);

// untuk hapus student
Route::delete('/admin/courses/delete/{id}', [CoursesController::class, 'destroy']);





