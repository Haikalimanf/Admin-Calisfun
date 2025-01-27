<?php

use App\Http\Controllers\ProfileController;
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


    //Route halaman
    Route::get('/course', function () {return view('course');})->name('course');
    Route::get('/unit', function () {return view('unit');})->name('unit');
    Route::get('/lessons', function () {return view('lessons');})->name('lessons');
    Route::get('/challange', function () {return view('challange');})->name('challange');
    Route::get('/challange-options', function () {return view('challange-options');})->name('challange-options');
    Route::get('/user', function () {return view('user');})->name('user');
});

require __DIR__.'/auth.php';
