<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\BookingInformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\Booking\BookingService;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }
    public function userBookigLists ()
    {
        $bookings = Booking::with('room') // assuming you have a relationship
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('frontend.user.booking_list', compact('bookings'));
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
            return redirect()->route('booking.information', ['slug' => $room->slug]);
        } else {
            return redirect()->back()->with('error', $response['message']);
        }
    }

    
    public function bookInformation($slug)
    {
        // Fetch the room by slug
        $room = Room::where('slug', $slug)->firstOrFail();
        $user = auth()->user();
        // Get booking ID from session
        $bookingId = session('booking_id');
    
        // Retrieve the booking from the database if the session has a booking ID
        $booking = $bookingId ? Booking::find($bookingId) : null;
    
        // Pass the room and booking data to the view
        $user = auth()->user();
        return view('rental-order-step1', compact('room', 'booking','user'));
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
        $bookingUserInformation = BookingInformation::create([
            'booking_id' => $request->booking_id,
            'name'       => $request->name,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'address'    => $request->address,
            'comments'   => $request->comments,
        ]);
    
        // Check if user exists by email
        $user = User::where('email', $request->email)->first();
    
        // If user doesn't exist, create and login
        if (!$user) {
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'type'     => User::USER_TYPE_USER,
                'phone'    => $request->phone,
                'password' => Hash::make('12345678'), 
            ]);
        }
    
        $booking = Booking::where('id',$request->booking_id)->first();
        if($booking){
            $booking->user_id = $user->id;
            $booking->save();
        }
        // Login the user (if not already logged in)
        if (!Auth::check()) {
            Auth::login($user);
        }
        session()->flash('success', 'Booking information saved successfully!');
        return $this->bookDetails($request, $bookingUserInformation);
    }
    
    public function bookDetails($request, $bookingInformation){

        $booking = Booking::where('id',$request->booking_id)->first();
        return view('rental-order-step2',compact('booking','bookingInformation'));

    }
    public function checkout(){

        return view('rental-order-step3');

    }

    
}
