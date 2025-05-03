<?php

use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobListingController;
use App\Http\Middleware\LogRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Option 1 - Assigning middleware to each routes
// Route::get('/job-listings', [JobListingController::class, 'index'])
//        ->name('job-listings.index')->middleware(['add.header.middleware', 'log.request']);
// Route::get('/job-listings/{joblisting}/apply', [JobApplicationController::class, 'index'])
//        ->name('job-applications.index')->middleware(['add.header.middleware', 'log.request', 'ensure.joblisting.exists']);
// Route::post('/job-listings/{joblisting}/apply', [JobApplicationController::class, 'store'])
//        ->name('job-applications.store')->middleware(['add.header.middleware', 'log.request', 'ensure.joblisting.exists']);

// Option 2 - Assigning a middleware to a group of routes
Route::middleware(['add.header.middleware', 'log.request', 'terminating.middleware'])->group(function () {
       Route::get('/job-listings', [JobListingController::class, 'index'])
              ->name('job-listings.index');
       Route::get('/job-listings/{joblisting}/apply', [JobApplicationController::class, 'index'])
              ->name('job-applications.index')->middleware(['ensure.joblisting.exists']);
       Route::post('/job-listings/{joblisting}/apply', [JobApplicationController::class, 'store'])
              ->name('job-applications.store')->middleware(['ensure.joblisting.exists', 'check.age:21']);
});