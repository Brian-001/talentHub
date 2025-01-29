@extends('layouts.dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Users</h1>
    
    <!-- Add a users table or other content here -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">ID</th>
                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Name</th>
                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Email</th>
                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Role ID</th>
                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $user->id }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $user->email }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $user->role_id }}</td>
                        <td class="py-2 px-4 border-b border-gray-200">{{ $user->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection