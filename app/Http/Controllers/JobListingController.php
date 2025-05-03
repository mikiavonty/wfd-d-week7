<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class JobListingController extends Controller
{
    public function index(): View {
        Log::info("JobListingController.index");
        $joblistings = JobListing::paginate(3);
        Log::debug("Returning view");
        return view('job-listings.index', [
            "joblistings" => $joblistings
        ]);
    }
}
