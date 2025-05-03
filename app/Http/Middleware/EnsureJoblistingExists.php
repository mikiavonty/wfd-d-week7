<?php

namespace App\Http\Middleware;

use App\Models\JobListing;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class EnsureJoblistingExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info("Entering EnsureJobListingExists Middleware");
        $jobListingId = $request->route('joblisting');

        if (!JobListing::where('id', $jobListingId)->exists()){
            Log::debug("Job list is not found!");
            return redirect()->route('job-listings.index')->with('error', "Job listing is not found!");
        }
        return $next($request);
    }
}
