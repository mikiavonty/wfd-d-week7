<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobListingController extends Controller
{
    public function index(): View {
        $joblistings = JobListing::paginate(3);
        return view('job-listings.index', [
            "joblistings" => $joblistings
        ]);
    }
}
