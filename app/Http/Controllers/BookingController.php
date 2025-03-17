<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\BookingInformation;
use Illuminate\Support\Facades\Auth;
use App\Services\Booking\BookingService;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }
    public function showBookingForm($slug)
    {
        // Fetch the room by slug
        $room = Room::where('slug', $slug)->firstOrFail();

        // Pass the room data to the view
        return view('rental-order', compact('room'));
    }
   
    public function bookRoom(Request $request)
    {
        $request->validate([
            'room_id'   => 'required|exists:rooms,id',
            'start_date'=> 'required|date|after_or_equal:today',
            'end_date'  => 'required|date|after:start_date',
            'amount'    => 'required|numeric|min:1',
            'stripe_token' => 'nullable|string',
        ]);

        $response = $this->bookingService->createBooking($request);

        if ($response['success']) {
            $room = Room::findOrFail($request->room_id); // Fetch the room details
            $booking = $response['booking']; // Get the booking details

            // Store booking ID in session
            session(['booking_id' => $booking->id]);

            // Redirect to bookInformation route
            return redirect()->route('booking.information', ['slug' => $room->slug])
                            ->with('success', 'Room booked successfully.');
        } else {
            return redirect()->back()->with('error', $response['message']);
        }
    }

    
    public function bookInformation($slug)
    {
        // Fetch the room by slug
        $room = Room::where('slug', $slug)->firstOrFail();
    
        // Get booking ID from session
        $bookingId = session('booking_id');
    
        // Retrieve the booking from the database if the session has a booking ID
        $booking = $bookingId ? Booking::find($bookingId) : null;
    
        // Pass the room and booking data to the view
        return view('rental-order-step1', compact('room', 'booking'));
    }
    
    
    public function bookInformationStore(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'phone'     => 'required|string|max:20',
            'email'     => 'nullable|email|max:255',
            'address'   => 'nullable|string',
            'comments'  => 'nullable|string',
        ]);


          
            // Store Booking Information
            BookingInformation::create([
                'booking_id' => $request->booking_id,
                'name'       => $request->name,
                'phone'      => $request->phone,
                'email'      => $request->email,
                'address'    => $request->address,
                'comments'   => $request->comments,
            ]);

            return redirect()->route('checkout');
       
    }
    public function checkout(){

        return view('rental-order-step3');


    }

    
}
