<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
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
            return redirect()->back()->with('success', 'Room updated successfully.');
        } else {
            return response()->json(['error' => $response['message']], 400);
        }
    }
}
