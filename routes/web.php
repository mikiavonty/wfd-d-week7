<?php

use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/job-listings', [JobListingController::class, 'index'])
       ->name('job-listings.index');
Route::get('/job-listings/{joblisting}/apply', [JobApplicationController::class, 'index'])
       ->name('job-applications.index');
Route::post('/job-listings/{joblisting}/apply', [JobApplicationController::class, 'store'])
       ->name('job-applications.store');