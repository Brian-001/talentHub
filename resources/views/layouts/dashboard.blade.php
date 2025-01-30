<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Dashboard')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <div class="flex">
        <!-- Sidebar -->
        <div class="bg-cyan-800 text-white w-64 min-h-screen">
            <div class="p-4">
                <h1 class="text-xl font-bold">@yield('title')</h1>
                <nav class="mt-4">
                    <div class="mb-4 hover:text-gray-900">
                        <a href="/" class="block py-2 px-2 hover:bg-cyan-200 font-semibold rounded-md">Back to Main Page</a>
                    </div>
                    {{-- Checks for Athenticated user and A user of role Admin --}}
                    @if (Auth::check() && Auth::user()->role_id === 1)
                        <div class="hover:shadow-md hover:shadow-cyan-300">
                            <a wire:navigate href="{{ route('admin.home') }}" class="block py-2 px-4 rounded-md">Home</a>
                        </div>
                        <div class="hover:shadow-md hover:shadow-cyan-300">
                            <a wire:navigate href="{{ route('admin.users') }}" class="block py-2 px-4 rounded-md">Users</a>
                        </div>
                        <div class="hover:shadow-md hover:shadow-cyan-300">
                            <a wire:navigate href="{{ route('admin.settings') }}" class="block py-2 px-4 rounded-md">Settings</a>
                        </div>
                    @endif

                    {{-- Checks for Athenticated user and A user of role Employee --}}
                    @if (Auth::check() && Auth::user()->role_id === 2)
                        <div class="hover:shadow-md hover:shadow-cyan-300">
                            <a wire:navigate href="{{route('employee.employee-home')}}" class="block py-2 px-4 rounded-md">Home</a>
                        </div>
                        <div class="hover:shadow-md hover:shadow-cyan-300">
                            <a wire:navigate href="{{route('employee.employee-profile')}}" class="block py-2 px-4 rounded-md">Profile</a>
                        </div>
                    @endif

                    {{-- Checks for Athenticated user and A user of role Employer --}}
                    @if (Auth::check() && Auth::user()->role_id === 3)
                        <div class="hover:shadow-md hover:shadow-cyan-300">
                            <a wire:navigate href="{{route('employer.employerdashboard-home')}}" class="block py-2 px-4 rounded-md">Home</a>
                        </div>
                        <div class="hover:shadow-md hover:shadow-cyan-300">
                            <a wire:navigate href="{{route('employer.employerdashboard-profile')}}" class="block py-2 px-4 rounded-md">Profile</a>
                        </div>
                    @endif
                </nav>
            </div>
        </div>
        <!-- Main Content -->
        <div class="flex-1 p-8">
            @yield('content') <!-- This will render the content of each page -->
        </div>
    </div>
    @livewireScripts
</html>