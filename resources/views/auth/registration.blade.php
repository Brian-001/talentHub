@extends('layouts.app')

@section('title', 'Register')
@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-10 rounded-lg shadow-md w-96">
        {{-- <div class="mt-4 mb-4 flex items-center justify-end">
            <a href="/" class="flex gap-1 hover:gap-2"><x-icons.arrow-back />Back</a>
        </div> --}}
        <h1 class="text-2xl font-bold mb-6 text-center">Register</h1>
        <form action="{{route('register')}}" method="POST" >
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="name" id="name" name="name" required autocomplete="off" class="mt-1 p-2 w-full rounded-md border border-slate-500">
                @error('name')
                    <span class="text-small text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required autocomplete="off" class="mt-1 p-2 w-full rounded-md border border-slate-500">
                @error('email')
                    <span class="text-small text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required class="mt-1 p-2 w-full rounded-md border border-slate-500">
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required class="mt-1 p-2 w-full rounded-md border border-slate-500">
            </div>
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Select Role</label>
                <select name="role_id" id="role" class="mt-1 p-2 w-full rounded-md border border-slate-500">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection
   