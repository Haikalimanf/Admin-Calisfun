<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UnitController;


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


    //Route halaman Course
    Route::get('/course', [CourseController::class, 'index'])->name('course');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');


    Route::get('/courses', [CourseController::class, 'index'])->name('course');
    Route::get('/courses/search', [CourseController::class, 'search'])->name('courses.search');

    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
    
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    
    Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
    
    // Route halaman Unit
    Route::get('/units/create', [CourseController::class, 'unit'])->name('units.create');
    



    // Route untuk menampilkan unit
    Route::get('/units', [UnitController::class, 'index'])->name('unit'); // Route untuk menampilkan daftar unit
    Route::get('/units/create', [UnitController::class, 'create'])->name('units.create'); // Route untuk form create unit
    Route::post('/units', [UnitController::class, 'store'])->name('units.store'); // Route untuk menyimpan unit baru
    Route::get('/units/{id}/edit', [UnitController::class, 'edit'])->name('units.edit'); // Route untuk form edit unit
    Route::put('/units/{id}', [UnitController::class, 'update'])->name('units.update'); // Route untuk update unit
    Route::delete('/units/{id}', [UnitController::class, 'destroy'])->name('units.destroy'); // Route untuk menghapus unit
    Route::get('/units/search', [UnitController::class, 'search'])->name('units.search'); // Route untuk pencarian unit
    
    Route::get('/lessons', function () {return view('lessons');})->name('lessons');
    Route::get('/challenge', function () {return view('challenge');})->name('challenge');
    Route::get('/challenge-options', function () {return view('challenge-options');})->name('challenge-options');
    Route::get('/user', function () {return view('user');})->name('user');
    Route::get('/edit-unit', function () {return view('editUnit');})->name('editUnit');
    Route::get('/edit-unit-lesson', function () {return view('editUnitLesson');})->name('editUnitLesson');
    Route::get('/edit-challenge', function () {return view('editChallenge');})->name('editChallenge');
    Route::get('/edit-challenge-options', function () {return view('editChallengeOptions');})->name('editChallengeOptions');
    Route::get('/create-unit', function () {return view('createUnit');})->name('createUnit');
    Route::get('/create-unit-lesson', function () {return view('createUnitLesson');})->name('createUnitLesson');
    Route::get('/create-challenge', function () {return view('createChallenge');})->name('createChallenge');
    Route::get('/create-challenge-options', function () {return view('createChallengeOptions');})->name('createChallengeOptions');
});

require __DIR__.'/auth.php';
