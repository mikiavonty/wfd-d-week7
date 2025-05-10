<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        Log::info("JobApplicationController.index");
        $job = JobListing::where('id', $id)->firstOrFail();
        return view('job-applications.index', [
            "job" => $job
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info("JobApplicationController.store");
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone_number' => 'required',
            'cover_letter' => 'required|max:1000',
            'resume_file' => 'required|file|mimes:pdf,docx',
            'job_listing_id' => 'required|numeric'
        ]);

        if (!$validated) {
            Log::error("Data sent is not valid.");
            return redirect()->back()->withInput();
        }

        $file_path = $request->file('resume_file')->store('resumes');
        $jobApplication = JobApplication::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "cover_letter" => $request->cover_letter,
            "resume_file_path" => $file_path,
            "job_listing_id" => $request->job_listing_id
        ])->save();
        return redirect()->route('job-listings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
