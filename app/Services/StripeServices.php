<?php

namespace App\Services;
use Illuminate\Http\Request;

class StripeServices
{
    public function stripePost(Request $request)
    {
        dd($request->all());
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from AeroTravel"
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
