@extends('layouts.dashboard')
@section('title', 'Employee Dashboard')
@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Your Job Application</h1>
        @if (!$listing)
            <div>
                <a wire:navigate href="{{route('employee.listings.create')}}" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded">Create</a>
            </div> 
        @endif  
    </div>

    @if ($listing)
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-gray-100 p-4">
                <h2 class="text-xl font-semibold">Job Status</h2>
            </div>
            <div class="p-4">
                <p class="mb-2"><strong>Status:</strong> 
                    <span class="px-2 py-1 text-sm rounded-full 
                        @if($listing->status === 'pending') bg-yellow-100 text-yellow-800
                        @elseif($listing->status === 'interview') bg-blue-100 text-blue-800
                        @elseif($listing->status === 'hired') bg-green-100 text-green-800
                        @endif">
                        {{ ucfirst($listing->status) }}
                    </span>
                </p>
                <p class="mb-2"><strong>Full Name:</strong> {{$listing->full_name}} </p>
                <p class="mb-2"><strong>Phone Number:</strong> {{$listing->phone_number}} </p>
                <p class="mb-2"><strong>Nationality:</strong> {{$listing->nationality}} </p>
                <p class="mb-2"><strong>Job Title:</strong> {{$listing->job_title}}</p>
                <p class="mb-2"><strong>Job Qualification:</strong>{{$listing->job_qualifications}} </p>
                <p class="mb-2"><strong>Resume/CV:</strong>
                    <a href="{{ asset('storage/' . $listing->resumecv_path) }}" target="_blank">{{ $listing->resumecv_path }}</a>
                </p>
            </div>
        </div>
    @else
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-4 text-center">
            <p class="text-lg font-semibold">You haven't created a job application yet.</p>
            <p class="mt-2">Click the "Create" button above to get started.</p>
        </div>
    @endif
</div>
@endsection