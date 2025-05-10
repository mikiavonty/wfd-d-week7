<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\JobApplicationController;

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

require __DIR__.'/auth.php';

Route::middleware(['auth', 'add.header.middleware', 'log.request', 'terminating.middleware'])->group(function () {
       Route::get('/job-listings', [JobListingController::class, 'index'])
              ->name('job-listings.index');
       Route::get('/job-listings/{joblisting}/apply', [JobApplicationController::class, 'index'])
              ->name('job-applications.index')->middleware(['ensure.joblisting.exists']);
       Route::post('/job-listings/{joblisting}/apply', [JobApplicationController::class, 'store'])
              ->name('job-applications.store')->middleware(['ensure.joblisting.exists', 'check.age:21']);
});