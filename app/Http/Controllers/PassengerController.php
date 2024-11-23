<?php

namespace App\Http\Controllers;

// use App\Models\PassengerDetails;

use App\Http\Requests\PassengerRequest;
use App\Models\PassengerDetails;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
   public function passengerStore(Request $request){
        $passenger = new PassengerDetails();
        $passenger->schedule_flights_id = $request->schedule_flights;
        $passenger->fname = $request->fname;
        $passenger->lname = $request->lname;
        $passenger->contact = $request->contact;
        $passenger->dob = $request->dob;
        $passenger->npassengers = $request->npassengers;
        $saved = $passenger->save();
        if($saved){
            if($request->schedule_flights > 0){
                return redirect()->route('client.stripepayment', $passenger->id)->with('message', 'category successfully added');
                
            }else{
                return redirect()->back();
            }

        }
        else{
            return redirect()->back()->with('message', 'category could not be add');
        }
    }
       
}




