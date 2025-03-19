<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use App\Models\Booking;
use Illuminate\Support\Facades\Session;

class StripePaymentController extends Controller
{
    public function checkout(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET')); // Set your Stripe secret key

        // Get booking ID from session
        $bookingId = session('booking_id');

        if (!$bookingId) {
            return redirect()->back()->with('error', 'No booking found.');
        }

        // Retrieve booking details
        $booking = Booking::findOrFail($bookingId);

        // Create Stripe Checkout Session
        $checkoutSession = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Room Booking',
                    ],
                    'unit_amount' => 100, // Convert to cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('booking.success'), // Redirect after success
            'cancel_url' => route('booking.cancel'), // Redirect after cancel
        ]);
        
        // Redirect to Stripe Checkout page
        return redirect()->away($checkoutSession->url);
    
    }
}

