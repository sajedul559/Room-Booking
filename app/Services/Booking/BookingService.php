<?php

namespace App\Services\Booking;

use Exception;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookingService
{
    public function checkRoomAvailability($roomId, $startDate, $endDate)
    {
        return !Booking::where('room_id', $roomId)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                      ->orWhereBetween('end_date', [$startDate, $endDate])
                      ->orWhere(function ($query) use ($startDate, $endDate) {
                          $query->where('start_date', '<=', $startDate)
                                ->where('end_date', '>=', $endDate);
                      });
            })->exists();
    }

    public function createBooking($request)
    {
        // if (!$this->checkRoomAvailability($request->room_id, $request->start_date, $request->end_date)) {
        //     return ['success' => false, 'message' => 'Room is not available for the selected dates.'];
        // }
    
        DB::beginTransaction();
        try {
            // Set default status (if not provided, default to 'pending')
            $status = $request->status ?? Booking::STATUS_PENDING;
           
    
            // Create Booking
            $booking = Booking::create([
                'user_id'   => 1,
                'room_id'   => $request->room_id,
                'start_date'=> $request->start_date,
                'end_date'  => $request->end_date,
                'status'    => $status,
            ]);
    
            // Process Payment via Stripe (only if stripe_token is provided)
            if ($request->stripe_token) {
                Stripe::setApiKey(env('STRIPE_SECRET'));
    
                $charge = Charge::create([
                    'amount'   => $request->amount * 100, // Convert to cents
                    'currency' => 'usd',
                    'source'   => $request->stripe_token,
                    'description' => "Payment for Booking ID: {$booking->id}",
                ]);
    
                // Save Payment Details
                Payment::create([
                    'booking_id' => $booking->id,
                    'user_id'    => 1,
                    'amount'     => $request->amount,
                    'stripe_payment_id' => $charge->id,
                    'status'     => 'paid',
                ]);
    
                // Update booking status to confirmed after successful payment
                $booking->update(['status' => Booking::STATUS_CONFIRMED]);
            }
    
            DB::commit();
            return ['success' => true, 'message' => 'Booking successful', 'booking' => $booking];
    
        } catch (Exception $e) {
            DB::rollBack();
            return ['success' => false, 'message' => 'Payment failed: ' . $e->getMessage()];
        }
    }
    
}
