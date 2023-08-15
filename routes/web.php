<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\TransaksiController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/course', [CourseController::class, 'index'])->name('course.index');
    Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
    Route::get('/course/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
    Route::post('/course/update/{id}', [CourseController::class, 'update'])->name('course.update');
    Route::get('/course/destroy/{id}', [CourseController::class, 'destroy'])->name('course.destroy');
    Route::get('/course/{id}', [CourseController::class, 'view'])->name('course.view');
    Route::post('/course', [CourseController::class, 'store'])->name('course.store');

    Route::get('/instructor', [InstructorController::class, 'index'])->name('instructor.index');
    Route::get('/instructor/create', [InstructorController::class, 'create'])->name('instructor.create');
    Route::get('/instructor/edit/{id}', [InstructorController::class, 'edit'])->name('instructor.edit');
    Route::post('/instructor/update/{id}', [InstructorController::class, 'update'])->name('instructor.update');
    Route::get('/instructor/destroy/{id}', [InstructorController::class, 'destroy'])->name('instructor.destroy');
    Route::get('/instructor/{id}', [InstructorController::class, 'view'])->name('instructor.view');
    Route::post('/instructor', [InstructorController::class, 'store'])->name('instructor.store');

    Route::get('/qualification', [QualificationController::class, 'index'])->name('qualification.index');
    Route::get('/qualification/create', [QualificationController::class, 'create'])->name('qualification.create');
    Route::get('/qualification/edit/{id}', [QualificationController::class, 'edit'])->name('qualification.edit');
    Route::post('/qualification/update/{id}', [QualificationController::class, 'update'])->name('qualification.update');
    Route::get('/qualification/destroy/{id}', [QualificationController::class, 'destroy'])->name('qualification.destroy');
    Route::get('/qualification/{id}', [QualificationController::class, 'view'])->name('qualification.view');
    Route::post('/qualification', [QualificationController::class, 'store'])->name('qualification.store');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi/beli', [TransaksiController::class, 'beli'])->name('transaksi.beli');


});
require __DIR__.'/auth.php';
