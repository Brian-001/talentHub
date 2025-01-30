@extends('layouts.app')

@section('title', 'Home')
@section('content')
<x-navigation />
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-16">
    <div class="px-4 order-2 md:order-1">
        
        <h1 class="text-cyan-500 text-xl tracking-wide text-start md:text-center mt-4 mb-4">Find Your Dream Job. Hire the Best Talent</h1>
        <h2 class="text-lg font-semibold">
            Mission
        </h2>
        <p class="tracking-wider mb-2">
            To bridge the gap between employers and qualified employees both locally and globally by providing a secure and efficient platform for recruitment and talent acquisition.
        </p>
        <h2 class="text-lg font-semibold mb-2">
            Vision
        </h2>
        <p class="tracking-wider">
            To become the leading local and global platform connecting employers with skilled professionals, fostering economic growth and empowering individuals with fulfilling career opportunities.
        </p>
    </div>
    <div class="rounded-lg px-4 order-1 md:order-2">
        <img src="{{asset('img/cover_s.jpg')}}" alt="" class="h-72 w-full rounded-lg">
    </div>
</div>
@endsection