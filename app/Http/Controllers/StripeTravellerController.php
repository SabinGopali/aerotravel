<?php

namespace App\Http\Controllers;

use App\Models\Tdetail;
use App\Models\TravellerDetails;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripeTravellerController extends Controller
{
    public function stripe($id)
    {
        $trip_plan_id = $id;
        if($id > 0){
            return view('client.stripetraveller',compact('trip_plan_id'));
        }
        // $passenger = PassengerDetails::all();
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    // public function stripePost(Request $request)
    // {
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
    //     Stripe\Charge::create ([
    //             "amount" => 100 * 100,
    //             "currency" => "usd",
    //             "source" => $request->stripeToken,
    //             "description" => "Test payment from AeroTravel" 
    //     ]);
      
    //     Session::flash('success', 'Payment successful!');
              
    //     return back();
    // }
    public function stripePost(Request $request)
    {
        // Get traveller details and number of passengers from respective tables
        $trip_plan_id = $request->trip_pan_id;
        $tdetail = Tdetail::where('traveller_details_id', $trip_plan_id)->first();
        $travellerDetail = TravellerDetails::find($trip_plan_id);
        // $tdetail = Tdetail::where('traveller_details_id', $request->traveller_detail)->first();
        // $travellerDetail = TravellerDetails::find($request->traveller_detail);

        if (!$tdetail || !$travellerDetail) {
            return back()->with('error', 'Invalid traveller details or no passenger details found.');
        }

        // Retrieve required values
        $npassengers = $tdetail->npassengers;
        $packageCost = $travellerDetail->packagecost;

        // Calculate the total amount (number of passengers * package cost)
        $totalAmount = $npassengers * $packageCost;
        try {
            // Set Stripe secret key
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create the Stripe charge
            Stripe\Charge::create([
                "amount" => $totalAmount * 100, // Convert to cents
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment for {$npassengers} passengers"
            ]);

            // Flash success message
            Session::flash('success', 'Payment successful!');
            return back();
        } catch (\Exception $e) {
            // Handle errors (e.g., Stripe issues, invalid input)
            return back()->with('error', $e->getMessage());
        }
    }

}
