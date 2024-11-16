<?php

namespace App\Http\Controllers;

use App\Models\TravellerDetails;
use Illuminate\Http\Request;

class TravellerDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $travellerdetails = TravellerDetails::all();
        return view('admin.travellerdetails.index', compact('travellerdetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.travellerdetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // Initialize variables for image paths
        $destinationImagePath = null;
        $hotelImagePath = null;

        // Check and store destination image if it exists
        if ($request->hasFile('destinationImage')) {
            $destinationImagePath = $request->file('destinationImage')->store('uploads/photos', 'public');
        }

        // Check and store hotel image if it exists
        if ($request->hasFile('hotelimage')) {
            $hotelImagePath = $request->file('hotelimage')->store('uploads/photos', 'public');
        }
        $travellerdetails = new TravellerDetails();
        $travellerdetails->tripname = $request->tripname;
        $travellerdetails->packagecost = $request->packagecost;
        $travellerdetails->description = $request->description;
        $travellerdetails->destinationImage = $destinationImagePath;
        $travellerdetails->hotelname = $request->hotelname;
        $travellerdetails->hotelimage = $hotelImagePath;
        $travellerdetails->rating = $request->rating;
        $travellerdetails->hotellocation = $request->hotellocation;
        $saved = $travellerdetails->save();
        //  dd($travellerdetails);
        if($saved){
            return redirect()->route('admin.travellerdetails.index')->with('message', '$travellerdetails successfully added');
        }
        else{
            return redirect()->back()->with('message', 'category could not be add');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TravellerDetails  $travellerDetails
     * @return \Illuminate\Http\Response
     */
     public function show(TravellerDetails $travellerDetails)
     {

     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TravellerDetails  $travellerDetails
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {
        $travellerdetails = TravellerDetails::findOrFail($id);
        return view('admin.travellerdetails.edit', compact('travellerdetails'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TravellerDetails  $travellerDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            // Initialize variables for image paths
            $destinationImagePath = null;
            $hotelImagePath = null;

            // Find the traveller details by ID
            $travellerdetails = TravellerDetails::findOrFail($id);

            // Check and store destination image if it exists
            if ($request->hasFile('destinationImage')) {
                $destinationImagePath = $request->file('destinationImage')->store('uploads/photos', 'public');
                $travellerdetails->destinationImage = $destinationImagePath;
            }

            // Check and store hotel image if it exists
            if ($request->hasFile('hotelimage')) {
                $hotelImagePath = $request->file('hotelimage')->store('uploads/photos', 'public');
                $travellerdetails->hotelimage = $hotelImagePath;
            }

            // Update other fields
            $travellerdetails->tripname = $request->tripname;
            $travellerdetails->packagecost = $request->packagecost;
            $travellerdetails->description = $request->description;
            $travellerdetails->hotelname = $request->hotelname;
            $travellerdetails->rating = $request->rating;
            $travellerdetails->hotellocation = $request->hotellocation;

            // Save changes to the database
            $saved = $travellerdetails->save();

            // Redirect based on the result
            if ($saved) {
                return redirect()->route('admin.travellerdetails.index')->with('message', '$travellerdetails successfully added');
            } else {
                return redirect()->back()->with('message', 'Category could not be added');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TravellerDetails  $travellerDetails
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $review = TravellerDetails::where('id', $id)->first();
        $delete = $review->delete();
        if ($delete) {
            return redirect()->back()->with('success', 'Traveller details deleted successfully');
        }
    }
}
