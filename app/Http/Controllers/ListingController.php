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
        //Check if user is authenticated
        if(!Auth::check()){
            return redirect('')->route('login')->with('error', 'You must be logged in to view your job application');
        }

        $user = Auth::user();
        //Fetch the employee's listing (if any)
        $listing = $user->listing;

        //Pass the listing to the view
        return view('employee.listings.index', compact('listing'));

    }

    public function allListings()
    {
        //Check if user is authenticated and has a role_id = 3 (Employer)
        if(!Auth::check() || Auth::user()->role_id != 3)
        {
            abort(403, 'Unauthorized action');
        }

        //Fetch all employee listings
        $listings = Listing::with('user') //Eager load with the associated user
                        ->whereHas('user', function ($query) {
                            $query->where('role_id', 2); // Only fetch listings for employees role_id = 2
                        })->paginate(4);
        //Pass the listing to the view
        return view('employee.listings.all', compact('listings'));
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
            'phone_number' => 'required|string|max:15',
            'nationality' => 'required|string',
            'job_title' => 'required|string',
            'job_qualifications' => 'required|string',
            'resumecv_path' => 'required|file|mimes:pdf',
        ]);

        if($request->hasFile('resumecv_path')) {
            $resumecv_path = $request->file('resumecv_path')->store('resumes', 'public');
            $validatedData['resumecv_path'] = $resumecv_path;
        }

        //Associate the listing with the currently authenticated user
        $validatedData['user_id'] = Auth::id(); // Add user_id to validatedData

        Listing::create($validatedData);

        return redirect()->route('employee.listings.index')->with('success', 'Your job application details have been created successfully');

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
