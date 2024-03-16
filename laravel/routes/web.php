<?php

use App\Http\Controllers\client\EventController;
use App\Http\Controllers\client\GoogleController;
use App\Http\Controllers\client\Project;
use App\Http\Controllers\client\ProjectHome;
use App\Http\Controllers\client\Wordpress;
use App\Http\Controllers\Controller;
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


//Home
Route::prefix('/')->group(function () {
    Route::get('/', [Controller::class, 'index']);
    // layout bodyHome
    Route::get('/', [ProjectHome::class, 'index']);
    // pages project
    Route::get('/project', [Project::class, 'index'])->name('project');

    // event
    Route::get('/event', [EventController::class, 'index'])->name('event');
    Route::post('/event/register', [EventController::class, 'register'])->name('event.register');
    Route::get('/search-event', [EventController::class, 'search'])->name('search');
    // wordpress
    Route::get('/wordpress', [Wordpress::class, 'index'])->name('wordpress');
    Route::get('/download/{file}', [Wordpress::class, 'downloadFile'])->name('download');
    Route::get('/search-wordpress', [Wordpress::class, 'search'])->name('search');
});

//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/// login google
Route::get('auth/google', [GoogleController::class, 'googlepage']);
Route::get('auth/google/callback', [GoogleController::class, 'googlecallback']);

require __DIR__ . '/auth.php';
