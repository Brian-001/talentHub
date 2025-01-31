<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listing = Auth::user();
        $listings = Listing::all();
        return view('employee.listings.index', compact('listing', 'listings'));
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

        $resumecv_path = $request->file('resumecv_path')->store('resumes', 'public');

        $listing = Listing::create($validatedData);
        // $listing = Listing::create([
        //     'full_name' => $validatedData['full_name'],
        //     'phone_number' => $validatedData['phone_number'],
        //     'nationality' => $validatedData['nationality'],
        //     'job_title' => $validatedData['job_title'],
        //     'job_qualifications' => $validatedData['job_qualifications'],
        //     'resumecv_path' => $resumecv_path,
        // ]);

        return view('employee.listings.index')->with('success', 'Your job application details have been created successfully');

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
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string',
            'nationality' => 'required|string',
            'job_title' => 'required|string',
            'job_qualifications' => 'required|string',
            'resumecv_path' => 'required|file|mimes:pdf',
        ]);

        //Checks if the resume or cv was uploaded and update the path if necessary
        if($request->hasFile('resumecv_path')){
            $resumecv_path = $request->file('resumecv_path')->store('resumes', 'public');
            $validated['resumecv_path'] = $resumecv_path;
        }

        $listing = Listing::findOrFail($id);
        $listing->update($validatedData);

        return redirect()->route('employee.listings.index')->with('success', 'Job application updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $listing = Listing::findOrFail($id);
        $listing ->delete();
        return redirect()->route('employee.listings.index')->with('success', 'Job application deleted successfully');
    }
}
