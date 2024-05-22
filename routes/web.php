<?php

use App\Http\Controllers\DashboardController;
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