@extends('templates.base')

@section('content')
    <div class="max-w-xl m-auto pt-6 pb-6">
        <h1 class="mt-1 text-2xl/8 font-medium tracking-tight text-gray-950 group-data-dark:text-white">Apply {{ $job->title }} Position</h1>
        <form action="{{ route('job-applications.store', ['joblisting' => $job->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <input type="hidden" name="job_listing_id" value="{{ ($job->id)?$job->id:old('job_listing_id') }}"/>
            <div class="col-span-full">
                <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                <div class="mt-2">
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    @error('name')
                        <div class="text-red-950">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-span-full">
                <label for="email" class="block text-sm/6 font-medium text-gray-900">E-mail</label>
                <div class="mt-2">
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    @error('email')
                        <div class="text-red-950">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-span-full">
                <label for="phone_number" class="block text-sm/6 font-medium text-gray-900">Phone Number</label>
                <div class="mt-2">
                    <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    @error('phone_number')
                        <div class="text-red-950">{{ $message }}</div>
                    @enderror
                </div>
            </div>
  
            <div class="col-span-full">
                <label for="cover_letter" class="block text-sm/6 font-medium text-gray-900">Cover Letter</label>
                <div class="mt-2">
                    <textarea name="cover_letter" id="cover_letter" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('cover_letter') }}</textarea>
                    @error('cover_letter')
                        <div class="text-red-950">{{ $message }}</div>
                    @enderror
                </div>
              {{-- <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about yourself.</p> --}}
            </div>
  
            <div class="col-span-full">          
                <label class="block mb-2 text-sm font-medium text-gray-900" for="resume_file">Resume</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="resume_file" name="resume_file" type="file">
                @error('resume_file')
                    <div class="text-red-950">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-span-4">
                <button type="submit" class="inline-flex justify-center rounded-full text-sm/6 font-semibold bg-gray-950 text-white hover:bg-gray-800 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-950 px-3.5 py-1">Apply</button>
                <a href="{{ route('job-listings.index') }}">
                    <button type="button" class="inline-flex justify-center rounded-full text-sm/6 font-semibold bg-gray-950 text-white hover:bg-gray-800 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-950 px-3.5 py-1">Cancel</button>
                </a>
            </div>
          </div>
        </form>
    </div>
@endsection