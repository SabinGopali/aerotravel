<?php

namespace App\Http\Controllers;

use App\Models\AddFlight;
use Illuminate\Http\Request;

class AddFlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.addflight.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addflight.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $addflight = new AddFlight();
        $addflight->Flight_Number = $request->Flight_No;
        // $addflight->flight_classes = json_encode($request->flight_classes);
        $addflight->is_economy_available = $request->has('is_economy_available') ? true : false;
        $addflight->is_business_available = $request->has('is_business_available') ? true : false;
    
        $addflight->NOS_Economy = $request->NOS_Economy;
        $addflight->NOS_Business = $request->NOS_Business;
        $addflight->NOS_Total = $request->NOS_Total;
        
        $saved = $addflight->save();
        // dd($addflight);
        if($saved){
            return redirect()->route('admin.addflight.index')->with('message', 'category successfully added');
        }
        else{
            return redirect()->back()->with('message', 'category could not be add');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddFlight  $addFlight
     * @return \Illuminate\Http\Response
     */
    public function show(AddFlight $addFlight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddFlight  $addFlight
     * @return \Illuminate\Http\Response
     */
    public function edit(AddFlight $addFlight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddFlight  $addFlight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddFlight $addFlight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddFlight  $addFlight
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddFlight $addFlight)
    {
        //
    }
}
