@extends('layouts.dashboard')

@section('title', 'Employee Dashboard')

@section('content')
<h1 class="text-sm md:text-base lg:text-2xl font-bold mb-4 text-center">Create Job Listing</h1>
    <form action="{{route('employee.listings.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Display global error messages -->
        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="grid grid-cols-1 md:grid-cols-2 w-1/2 gap-4 h-[70vh] md:items-center md:justify-center md:mx-auto">
            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" class="mt-1 px-4 blocK h-10 w-full border border-gray-900 rounded-md shadow-sm sm:text-sm" required>
                @error('full_time')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number')}}" class="mt-1 px-4 block h-10 w-full border border-gray-900 rounded-md shadow-sm sm:text-sm" required>
                @error('phone_number')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                <input type="text" name="nationality" id="nationality" value="{{ old('nationality') }}" class="mt-1 px-4 block h-10 w-full border border-gray-900 rounded-md shadow-sm sm:text-sm" required>
                @error('nationality')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
                <input type="text" name="job_title" id="job_title" value="{{ old('job_title')}}" class="mt-1 px-4 block h-10 w-full border border-gray-900 rounded-md shadow-sm sm:text-sm" required>
                @error('job_title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="sm:col-span-2">
                <label for="job_qualifications" class="block text-sm font-medium text-gray-700">Job Qualifications</label>
                <textarea name="job_qualifications" id="job_qualifications" rows="4" class="mt-1 px-4 py-4 block h-40 w-full border border-gray-900 rounded-md shadow-sm sm:text-sm resize-none" required></textarea>
                @error('job_qualifications')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="sm:col-span-2">
                <label for="resumecv_path" class="block text-sm font-medium text-gray-700">Upload CV/Resume</label>
                <input type="file" name="resumecv_path" id="resumecv_path" accept="application/pdf" class="mt-1 block h-10 w-full text-sm text-gray-900 cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100 file:cursor-pointer" required>
                @error('resumecv_path')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="sm:col-span-2">
                <label for="work_environment" class="block text-sm font-medium text-gray-700">Work Environment</label>
                <select name="work_environment" id="work_environment" class="mt-1 px-4 block h-10 w-full border border-gray-900 rounded-md shadow-sm  sm:text-sm" required>
                    <option value="Local">Local</option>
                    <option value="Abroad">Abroad</option>
                    <option value="Both">Both</option>
                </select>
                @error('work_environment')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mt-6 flex items-center justify-center">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700">
                Submit
            </button>
        </div>
    </form>
@endsection