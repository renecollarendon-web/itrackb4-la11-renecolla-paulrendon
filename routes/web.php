<?php
use App\Http\Controllers\MovieController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::get('/movies/featured', [MovieController::class, 'featured'])
->name('movies.featured');
Route::resource('movies', MovieController::class)->only(['index', 'show']);

//Route::resource('teachers', TeacherController::class)->only(['index', 'show']);
//Route::get('/teachers/featured', [TeacherController::class, 'featured'])->name('teachers.featured');

