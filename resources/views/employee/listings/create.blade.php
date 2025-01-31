@extends('layouts.dashboard')

@section('content')
<h1 class="text-3xl font-bold mb-4">Create Job Listing</h1>
    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm" required>
            </div>
            <div>
                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm" required>
            </div>
            <div>
                <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                <input type="text" name="nationality" id="nationality" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm" required>
            </div>
            <div>
                <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
                <input type="text" name="job_title" id="job_title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm" required>
            </div>
            <div class="sm:col-span-2">
                <label for="job_qualifications" class="block text-sm font-medium text-gray-700">Job Qualifications</label>
                <textarea name="job_qualifications" id="job_qualifications" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm" required></textarea>
            </div>
            <div class="sm:col-span-2">
                <label for="resumecv_path" class="block text-sm font-medium text-gray-700">Upload CV/Resume</label>
                <input type="file" name="resumecv_path" id="resumecv_path" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
            </div>
            <div class="sm:col-span-2">
                <label for="work_environment" class="block text-sm font-medium text-gray-700">Work Environment</label>
                <select name="work_environment" id="work_environment" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm  sm:text-sm" required>
                    <option value="Local">Local</option>
                    <option value="Abroad">Abroad</option>
                    <option value="Both">Both</option>
                </select>
            </div>
        </div>
        <div class="mt-6">
            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-cyan-600 hover:bg-cyan-700">
                Submit
            </button>
        </div>
    </form>
@endsection