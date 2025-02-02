@extends('layouts.app')

@section('title', 'Login')
@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-10 rounded-lg shadow-md w-96">
        <div class="mt-4 mb-4 flex items-center justify-end">
            <a href="/" class="flex gap-1 hover:gap-2"><x-icons.arrow-back />Back</a>
        </div>
        <div class="mt-4 mb-2">
            @if(@session('status'))
            <div class="alert alert-success">
                <span class="text-sm text-red-500">{{session ('success')}}</span>
            </div>
            @endif
            @if (@session('error'))
                <div class="alert alert-danger">
                    <span class="text-sm text-red-500">{{session('error')}}</span>
                </div>
            @endif
        </div>
        
        <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>
        <form action="{{route('login')}}" method="POST" >
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required autocomplete="off" class="mt-1 p-2 w-full rounded-md border border-slate-500">
                @error('email')
                    <span class="text-sm text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required class="mt-1 p-2 w-full rounded-md border border-slate-500">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded">Login</button>
                
                <a href="{{route('register')}}">Create a new account?</a>
            </div>
            @if (Route::has('password.request'))
                <div class="mt-4 mb-2 flex items-center justify-center">
                    <a href="{{route('password.request')}}" class="text-cyan-500 hover:underline">Forgot Password?</a>
                </div>   
            @endif
        </form>
    </div>
</div>
@endsection
   