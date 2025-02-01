@extends('layouts.dashboard')
@section('title', 'Employee Dashboard')
@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Your Job Application</h1>
        <div>
            <a wire:navigate href="{{route('employee.listings.create')}}" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded">Create</a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-gray-100 p-4">
            <h2 class="text-xl font-semibold">My title</h2>
            <span class="inline-block bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded-full">Status</span>
        </div>
        <div class="p-4">
            <p class="mb-2"><strong>Status:</strong> Status</p>
            <p class="mb-2"><strong>Full Name:</strong>  </p>
            <p class="mb-2"><strong>Phone Number:</strong> </p>
            <p class="mb-2"><strong>Nationality:</strong> </p>
            <p class="mb-2"><strong>Job Title:</strong></p>
            <p class="mb-2"><strong>Job Qualification:</strong> </p>
            <p class="mb-2"><strong>Resume/CV:</strong></p>
        </div>
    </div>
</div>
@endsection