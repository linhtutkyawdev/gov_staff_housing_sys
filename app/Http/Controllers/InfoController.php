<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    
    public function store(Request $request)
    {
        // Validate the form input data
        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'nric' => 'required|string',
            'age' => 'required|integer',
            'exp' => 'required|integer',
            'rank' => 'required|string',
            'family_size' => 'required|integer',
            'number_of_weak_family_members' => 'required|integer',
            'accomodation_situation' => 'required|string',
            'physically_form_submitted_date' => 'required|date',
            'moved_to_state_date' => 'required|date',
            'both_couple_are_stuffs_in_same_city' => 'required|boolean',
            'special_situation' => 'nullable|string',
        ]);

        // Create a new record in the database
        Info::create($validatedData);

        return redirect()->route('employee-housing.create')->with('success', 'Form submitted successfully');
    }

}
