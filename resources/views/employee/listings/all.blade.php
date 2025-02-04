@extends('layouts.dashboard')

@section('title', 'Employer Dashboard')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">All Employee Job Applications</h1>

    {{-- Livewire DataTable Component --}}
    @livewire('data-table')
</div>
@endsection