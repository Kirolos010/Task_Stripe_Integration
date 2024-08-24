<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    //
    public function handle(Request $request)
    {
        $event = $request->all();

        // Handle the event
        switch ($event['type']) {
            case 'charge.succeeded':
                $charge = $event['data']['object'];
                
                // Update payment status in the database
                Payment::where('stripe_id', $charge['id'])
                    ->update(['status' => $charge['status']]);
                break;

            // Handle other event types
            default:
                return response()->json(['received' => true]);
        }

        return response()->json(['status' => 'success']);
    }
}
