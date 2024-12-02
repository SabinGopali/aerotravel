<?php
namespace App\Http\Controllers;

use App\Models\PassengerDetails;
use App\Models\ScheduleFlight;
use Illuminate\Http\Request;
use Session;
use Stripe;
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe($id)
    {
        // $passenger = PassengerDetails::all();
        $schedule_flights_id = $id;
        if($id > 0){
            return view('client.stripe', compact('schedule_flights_id'));
        }
    }
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    // public function stripePost(Request $request)
    // {
    //     // dd('hello', $request->all());
    //     // $id = $request->passenger_id;
    //     // $passenger = PassengerDetails::where('id', $id)->first();
    //     // $schedule_flights_id = PassengerDetails::find($schedule_flights_id);
        
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
        $passengerdetail_id = $request->passengerdetail_id;
        $passenger_detail = PassengerDetails::where('id', $passengerdetail_id)->first();
        $scheduleFlight = ScheduleFlight::find($passenger_detail->schedule_flights_id);
        
        // $tdetail = Tdetail::where('traveller_details_id', $request->traveller_detail)->first();
        // $travellerDetail = TravellerDetails::find($request->traveller_detail);

        if (!$passenger_detail || !$scheduleFlight) {
            return back()->with('error', 'Invalid traveller details or no passenger details found.');
        }

        // Retrieve required values
        $npassengers = $passenger_detail->npassengers;
        $packageCost = $scheduleFlight->class_cost;

        // Calculate the total amount (number of passengers * package cost)
        $totalAmount = $npassengers * $packageCost;
        try {
            // Set Stripe secret key
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create the Stripe charge
            Stripe\Charge::create([
                "amount" => $totalAmount * 100, // Convert to cents
                "currency" => "NPR",
                "source" => $request->stripeToken,
                "description" => "Payment for {$npassengers} passengers"
            ]);

            // Flash success message
            Session::flash('success', 'Payment successful!');
            return redirect()->route('client.index');
        } catch (\Exception $e) {
            // Handle errors (e.g., Stripe issues, invalid input)
            return back()->with('error', $e->getMessage());
        }
    }

}
