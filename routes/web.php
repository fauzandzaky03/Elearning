<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
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

Route::get('/admin/courses', [CoursesController::class, 'index']);