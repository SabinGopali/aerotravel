<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravellerRequest;
use Illuminate\Http\Request;
use App\Models\feedback;
use App\Models\PassengerDetails;
use App\Models\ScheduleFlight;
use App\Models\TravellerDetails;
use App\Models\TDetail;

class ClientControlller extends Controller
{
    public function index(){
        $travellerdetails = TravellerDetails::all();
        return view('client.index', compact('travellerdetails'));
    }

    public function flightlist(Request $request)
{
    // Retrieve the search parameters
    $from = $request->input('from');
    $to = $request->input('to');
    $departure = $request->input('departure');

    // Query the database for flights based on search criteria
    $flights = ScheduleFlight::query();

    if ($from) {
        $flights->where('select_source', $from);
    }

    if ($to) {
        $flights->where('select_destination', $to);
    }

    if ($departure) {
        $flights->whereDate('depart_date_time', $departure);
    }

    // Retrieve the flights or an empty collection if no results found
    $recommendedFlights = $flights->get();

    // Ensure recommendedFlights is an empty array if null
    if ($recommendedFlights === null) {
        $recommendedFlights = [];
    }
    // Return the view with the recommended flights
    return view('client.flightlist', ['recommendedFlights' => $recommendedFlights]);
}


    public function passengersDetails(){
        return view('client.passengersdetails');
    }

    public function previewDetails(){
        $scheduleflight = ScheduleFlight::all();
        return view('client.previewdetails', compact('scheduleflight'));
    }

    public function feedbackDetails(){
        return view('client.feedback');
    }

    // public function loginDetails(){
    //     return view('client.login');
    // }

    // public function registerDetails(){
    //     return view('client.register');
    // }

    public function store(Request $request){
        

        $feedback = new feedback();
        $feedback->Impression_Details = $request->impression;
        $feedback->hear = $request->hear;
        $feedback->Missing_Details = $request->missing;
        $feedback->rating = $request->rating;
        $saved = $feedback->save();

        if($saved){
            return redirect()->route('client.index')->with('message', 'category successfully added');
        }
        else{
            return redirect()->back()->with('message', 'category could not be add');
        }
    }

    public function tripplandetails($id){
        $travellerdetails = TravellerDetails::findorfail($id);
        return view('client.tripplan', compact('travellerdetails'));
    }
     
    public function travellerdetails($id){
        $traveller = TravellerDetails::findorfail($id);
        return view('client.travellerdetail',['travellerDetailId' => $traveller->id]);
    }

    public function tstore(TravellerRequest $request){
        $tdetail = new Tdetail();
        $tdetail->traveller_details_id = $request->traveller_detail ?? null;
        $tdetail->dob = $request->dob;
        $tdetail->fname = $request->fname;
        $tdetail->lname = $request->lname;
        $tdetail->contact = $request->contact;
        $tdetail->email = $request->email;
        $tdetail->npassengers = $request->npassengers;
        $saved = $tdetail->save();
        if($saved){
            return redirect()->route('client.stripetraveller')->with('message', 'category successfully added');
        }
        else{
            return redirect()->back()->with('message', 'category could not be add');
        }
    }

    public function paymentDetails(){
        return view('client.payment');
    }

    public function boardingpass($id){
        $scheduleflight = ScheduleFlight::all();
        $passengerdetail = PassengerDetails::where('id',$id)->first();
        return view('client.boardingpass', compact('scheduleflight', 'passengerdetail'));  
    }

    public function travellerboardingpass(){
        return view('client.travellerboardingpass');
    }

    // public function stripepayment(){
    //     return view('client.stripe');
    // }
    }


