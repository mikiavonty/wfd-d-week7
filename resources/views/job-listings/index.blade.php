{{-- @extends('templates.base')

@section('content') --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Listings') }}
        </h2>
    </x-slot>

    <div class="max-w-xl m-auto pt-6 pb-6">
        {{-- <h1 class="mt-1 text-2xl/8 font-medium tracking-tight text-gray-950 group-data-dark:text-white">Job Listings</h1> --}}
        @foreach ($joblistings as $job)
        <div class="py-4">
            <h3 class="mt-1 text-lg/8 font-medium tracking-tight text-gray-950 group-data-dark:text-white">{{ $job->title }}</h3>
            <div class="grid grid-cols-6 gap-x-5 gap-y-3">
                <p class="mt-2 max-w-[600px] text-sm/6 text-gray-950 font-medium">Company</p>
                <p class="col-span-2 mt-2 max-w-[600px] text-sm/6 text-gray-600 group-data-dark:text-gray-400">{{ $job->company }}</p>
                <p class="mt-2 max-w-[600px] text-sm/6 text-gray-950 font-medium">Location</p>
                <p class="col-span-2 mt-2 max-w-[600px] text-sm/6 text-gray-600 group-data-dark:text-gray-400">{{ $job->location }}</p>
                <p class="max-w-[600px] text-sm/6 text-gray-950 font-medium">Salary</p>
                <p class="col-span-2 max-w-[600px] text-sm/6 text-gray-600 group-data-dark:text-gray-400">Rp {{ number_format($job->salary, 0,",", ".") }},00</p>
                <p class="max-w-[600px] text-sm/6 text-gray-950 font-medium">Closing Date</p>
                <p class="col-span-2 max-w-[600px] text-sm/6 text-gray-600 group-data-dark:text-gray-400">{{ \Carbon\Carbon::parse($job->closing_date)->format("d F Y") }}</p>
            </div>

            <p class="mt-2 max-w-[600px] text-sm/6 text-gray-950 font-medium">Description</p>
            <p class="max-w-[600px] text-sm/6 text-gray-600 group-data-dark:text-gray-400">{{ $job->description }}</p>
            <a href="{{ route('job-applications.index', ['joblisting' => $job->id]) }}" class="mt-2 inline-flex rounded-full text-sm/6 font-semibold bg-gray-950 text-white hover:bg-gray-800 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-950 px-3.5 py-1">Apply</a>
        </div>
        @endforeach
        {{ $joblistings->links() }}
    </div>
</x-app-layout>
{{-- @endsection --}}