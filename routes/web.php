<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\CodexController;

Route::get('/', function () {
  return view('welcome');
});

Route::get('/outline', function () {
  return view('outline.index');
});

Route::prefix('outline')->name('outline.')->group(function () {
  Route::resource('codex', CodexController::class);
  Route::resource('chapters', ChapterController::class);
  Route::post('chapters/reorder', [ChapterController::class, 'reorder'])->name('chapters.reorder');
});

// empty modal route
Route::get('/modal/empty', function() {
  return '';
});