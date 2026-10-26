<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
Route::get('/', fn() => redirect()->route(auth()->check() ? 'students.index' : 'login'));
Route::middleware('guest')->group(function(){Route::get('/login',[AuthController::class,'showLogin'])->name('login');Route::post('/login',[AuthController::class,'login'])->name('login.post');Route::get('/register',[AuthController::class,'showRegister'])->name('register');Route::post('/register',[AuthController::class,'register'])->name('register.post');});
Route::middleware('auth')->group(function(){Route::post('/logout',[AuthController::class,'logout'])->name('logout');Route::resource('students',StudentController::class)->except(['show']);Route::get('/departments',[DepartmentController::class,'index'])->name('departments.index');Route::post('/departments',[DepartmentController::class,'store'])->name('departments.store');Route::delete('/departments/{department}',[DepartmentController::class,'destroy'])->name('departments.destroy');});
