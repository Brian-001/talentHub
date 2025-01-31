<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listings = Listing::all();
        return view('employee.listings.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('employee.listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string',
            'nationality' => 'required|string',
            'job_title' => 'required|string',
            'job_qualifications' => 'required|string',
            'resumecv_path' => 'required|file|mimes:pdf',
        ]);

        $resumecv_path = $request->file('resumecv_path')->store('resumes');

        Listing::create($validatedData, $resumecv_path);

        return view('employee.employee-home')->with('success', 'Your job application details have been created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $listing = Listing::findOrFail($id);

        return view('employee.listings.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $listing = Listing::findOrFail($id);
        return view('employee.listings.edit', compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
