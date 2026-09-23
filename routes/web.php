<?php
use App\Http\Controllers\MovieController; 
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\TeacherController;

Route::get('/movies/featured', [MovieController::class, 'featured'])
->name('movies.featured');
Route::get('/movies/filter/{genre?}', function($genre = null) {
return redirect()->route('movies.index', ['genre' => $genre]);})
->name('movies.filter.old');
Route::resource('movies', MovieController::class)->only(['index', 'show']);

//Route::resource('teachers', TeacherController::class)->only(['index', 'show']);
//Route::get('/teachers/featured', [TeacherController::class, 'featured'])->name('teachers.featured');

