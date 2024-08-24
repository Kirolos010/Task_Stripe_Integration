<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Payment;



class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment');
    }

    public function processPayment(Request $request)
    {
        // Set the Stripe API key directly
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Create a charge: this will charge the user's card
            $charge = Charge::create([
                'amount' => 1000, 
                'currency' => 'usd',
                'source' => $request->stripeToken, 
                'description' => 'Test Payment',
            ]);

            // Store payment details in the database
            Payment::create([
                'stripe_id' => $charge->id,
                'amount' => $charge->amount,
                'currency' => $charge->currency,
                'status' => $charge->status,
            ]);

            // Return the confirmation view with the charge details
            return view('confirmation', ['charge' => $charge]);

        } catch (\Exception $e) {
            // Return with an error message if something goes wrong
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    
}


    

