@extends('layouts.dashboard')

@section('title', 'Employer Dashboard')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">All Employee Job Applications</h1>

    <div class="grid grid-cols-2 gap-2 mb-4">
        @livewire('data-table')
    </div>
    @if ($listings->isEmpty())
        <p class="text-gray-600">No employee listings found.</p>
    @else
        <div class="space-y-4">
            {{-- @foreach ($listings as $listing)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gray-100 p-4">
                        <h2 class="text-xl font-semibold">{{ $listing->full_name }}</h2>
                    </div>
                    <div class="p-4">
                        <p><strong>Phone Number:</strong> {{ $listing->phone_number }}</p>
                        <p><strong>Nationality:</strong> {{ $listing->nationality }}</p>
                        <p><strong>Job Title:</strong> {{ $listing->job_title }}</p>
                        <p><strong>Job Qualifications:</strong> {{ $listing->job_qualifications }}</p>
                        <p><strong>Resume/CV:</strong>
                            <a href="{{ asset('storage/' . $listing->resumecv_path) }}" target="_blank">View Resume/CV</a>
                        </p>
                    </div>
                </div>
            @endforeach --}}
        </div>
    @endif

    {{-- table --}}
    <div class="relative">
        <table class="min-w-full table-fixed divide-y divide-gray-300 text-gray-900">
            <thead>
                <tr>
                    <th class="p-3 text-left text-sm font-semibold text-gray-900">
                        Full Name
                    </th>
                    <th class="p-3 text-left text-sm font-semibold text-gray-900">
                        Phone Number
                    </th>
                    <th class="p-3 text-left text-sm font-semibold text-gray-900">
                        Nationality
                    </th>
                    <th class="p-3 text-left text-sm font-semibold text-gray-900">
                        Job Title
                    </th>
                    <th class="p-3 text-left text-sm font-semibold text-gray-900">
                        Job Qualifications
                    </th>
                    <th class="p-3 text-left text-sm font-semibold text-gray-900">
                        Resume/CV
                    </th>
                    <th class="p-3 text-left text-sm font-semibold text-gray-900">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300 bg-white text-gray-700">
                @foreach ($listings as $listing)
                    <tr>
                        <td class="whitespace-nowrap p-3 text-sm">
                            {{$listing->full_name}}
                        </td>
                        <td class="whitespace-nowrap p-3 text-sm">
                            {{$listing->phone_number}}
                        </td>
                        <td class="whitespace-nowrap p-3 text-sm">
                            {{$listing->nationality}}
                        </td>
                        <td class="whitespace-nowrap p-3 text-sm">
                            {{$listing->job_title}}
                        </td>
                        <td class="whitespace-wrap p-3 text-sm">
                            {{$listing->job_qualifications}}
                        </td>
                        <td class="whitespace-nowrap p-3 text-sm">
                            <a href="{{ asset('storage/' . $listing->resumecv_path) }}" target="_blank">View Resume/CV</a>
                        </td>
                        <td class="whitespace-nowrap p-3 text-base">
                            <x-icons.ellipsis-horizontal />
                        </td>
                    </tr>  
                @endforeach
                
            </tbody>
        </table>
        {{--Loading Spinner--}}
        {{-- <div class="flex items-center justify-center absolute inset-0">

        </div> --}}
    </div>

</div>
@endsection