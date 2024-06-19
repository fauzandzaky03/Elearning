<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;

// Route untuk menampilkan teks

Route::get('/salam', function(){
    return "Assalamualaikum....";
});

Route::get('/profile', function (){
    return view('profile');
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route untuk menampilkan halaman student
Route::get('/admin/student', [StudentController::class, 'index'])->middleware('admin');
// untuk create
Route::get('/admin/student/create', [StudentController::class, 'create'])->middleware('admin');

// untuk simpan
Route::post('/admin/student/store', [StudentController::class, 'store'])->middleware('admin');

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
