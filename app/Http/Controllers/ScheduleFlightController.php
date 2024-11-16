<?php

namespace App\Http\Controllers;

use App\Models\ScheduleFlight;
use Illuminate\Http\Request;

class ScheduleFlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scheduleflight = ScheduleFlight::all();
        return view('admin.scheduleflight.index', compact('scheduleflight'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.scheduleflight.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departDateTime = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $request->input('depart_date_time'));
        $arrivDateTime = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $request->input('arriv_date_time'));
        $scheduleflight = new ScheduleFlight();
        $scheduleflight->flight_number = $request->flight_number;
        $scheduleflight->is_economy_class = $request->has('is_economy_class') ? true : false;
        $scheduleflight->is_business_class = $request->has('is_business_class') ? true : false;
        $scheduleflight->nos_economy = $request->nos_economy;
        $scheduleflight->nos_business = $request->nos_business;
        $scheduleflight->select_source = $request->select_source;
        $scheduleflight->select_destination = $request->select_destination;
        $scheduleflight->depart_date_time = $departDateTime;
        $scheduleflight->arriv_date_time = $arrivDateTime;
        $scheduleflight->sc_economy = $request->sc_economy;
        $scheduleflight->sc_business = $request->sc_business;
        
        $saved = $scheduleflight->save();
        // dd($scheduleflight);
        if($saved){
            return redirect()->route('admin.scheduleflight.index')->with('message', 'scheduleflight successfully added');
        }
        else{
            return redirect()->back()->with('message', 'category could not be add');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScheduleFlight  $scheduleFlight
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scheduleflight = ScheduleFlight::findorfail($id);
        return view('admin.scheduleflight.show', compact('scheduleflight'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScheduleFlight  $scheduleFlight
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scheduleflight = ScheduleFlight::findorfail($id);
        return view('admin.scheduleflight.edit', compact('scheduleflight'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScheduleFlight  $scheduleFlight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $departDateTime = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $request->input('depart_date_time'));
        $arrivDateTime = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $request->input('arriv_date_time'));
        $scheduleflight = ScheduleFlight::findorfail($id);
        $scheduleflight->flight_number = $request->flight_number;
        $scheduleflight->is_economy_class = $request->has('is_economy_class') ? true : false;
        $scheduleflight->is_business_class = $request->has('is_business_class') ? true : false;
        $scheduleflight->nos_economy = $request->nos_economy;
        $scheduleflight->nos_business = $request->nos_business;
        $scheduleflight->select_source = $request->select_source;
        $scheduleflight->select_destination = $request->select_destination;
        $scheduleflight->depart_date_time = $departDateTime;
        $scheduleflight->arriv_date_time = $arrivDateTime;
        $scheduleflight->sc_economy = $request->sc_economy;
        $scheduleflight->sc_business = $request->sc_business;
        
        $saved = $scheduleflight->save();
        // dd($scheduleflight);
        if($saved){
            if ($scheduleflight->is_economy_class && $scheduleflight->nos_economy > 0) {
                $scheduleflight->nos_economy -= 1;
                $scheduleflight->save();
            } elseif ($scheduleflight->is_business_class && $scheduleflight->nos_business > 0) {
                $scheduleflight->nos_business -= 1;
                $scheduleflight->save();
            }
            return redirect()->route('admin.scheduleflight.index')->with('message', 'scheduleflight successfully updated');
        }
        else{
            return redirect()->back()->with('message', 'category could not be add');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScheduleFlight  $scheduleFlight
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scheduleflight = ScheduleFlight::find($id); // Find the post by its ID

        if ($scheduleflight) {
            $scheduleflight->delete();
            return redirect()->route('admin.scheduleflight.index')->with('success', 'Post deleted successfully.');
        }

        return redirect()->route('admin.scheduleflight.index')->with('error', 'Post not found.'); // Delete the post
        }



        //algorithm implementation
    public function searchFlights(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $departureDate = $request->departure;

        // Fetch all scheduled flights from the database
        $flights = ScheduleFlight::all();

        // Find similar flights using Jaccard algorithm
        $recommendedFlights = $this->findSimilarFlights($from, $to, $departureDate, $flights);
        // Return the view with the list of recommended flights
        return view('client.flightlist', ['recommendedFlights' => $recommendedFlights]);
    }

    // This method will find similar flights using the Jaccard algorithm
    public function findSimilarFlights($from, $to, $departureDate, $flights)
    {
        $recommendedFlights = [];

        // Clean the input data
        $userFrom = $this->cleanText($from);
        $userTo = $this->cleanText($to);
        $userDate = $this->cleanText($departureDate);

        // Loop through all flights and calculate Jaccard similarity
        foreach ($flights as $flight) {
            // Clean flight data
            $flightFrom = $this->cleanText($flight->select_source);
            $flightTo = $this->cleanText($flight->select_destination);
            $flightDate = $this->cleanText($flight->depart_date_time); // Assuming this is a string date

            // Calculate Jaccard similarity for each attribute
            $fromSimilarity = $this->calculateJaccardSimilarity($userFrom, $flightFrom);
            $toSimilarity = $this->calculateJaccardSimilarity($userTo, $flightTo);
            $dateSimilarity = $this->calculateJaccardSimilarity($userDate, $flightDate);

            // If the similarities are above a certain threshold, add to recommendations
            if ($fromSimilarity > 0.5 && $toSimilarity > 0.5 && $dateSimilarity > 0.5) {
                $recommendedFlights[] = $flight;
            }
        }

        return $recommendedFlights;
    }

    // Jaccard similarity calculation
    public function calculateJaccardSimilarity($text1, $text2)
    {
        $words1 = collect(explode(' ', $text1))->unique();
        $words2 = collect(explode(' ', $text2))->unique();

        $intersection = $words1->intersect($words2)->count();
        $union = $words1->merge($words2)->count();

        return $union > 0 ? $intersection / $union : 0;
    }

    // Function to clean text by removing stopwords and punctuation
    public function cleanText($text)
    {
        $stopWords = ["a", "about", "above", "after", "again", "against", "all", "am", "an", "and", "any", "are", "as", "at"];
        $text = preg_replace("/[^a-zA-Z0-9\s]/", "", $text);
        $words = explode(' ', $text);
        $filteredWords = array_filter($words, function ($word) use ($stopWords) {
            return !in_array(strtolower($word), $stopWords);
        });

        return implode(' ', $filteredWords);
    }



}
