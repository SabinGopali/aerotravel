<?php
namespace App\Http\Controllers;

use App\Models\PassengerDetails;
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
    public function stripePost(Request $request)
    {
        dd('hello', $request->all());
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from AeroTravel" 
        ]);
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    
}
