<?php

namespace App\Http\Controllers\Admin\Booking;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use App\Models\TenantRent;
use Illuminate\Http\Request;
use App\Models\TenantPayment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Booking\BookingService;
use App\Http\Requests\BookingFormRequest;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
        // Apply permission checks globally for these actions
        // $this->middleware('can:Create Booking')->only('create', 'store');
        // $this->middleware('can:Edit Booking')->only('edit', 'update');
        // $this->middleware('can:Delete Booking')->only('destroy');
        // $this->middleware('can:Index Bookings')->only('index');
        
    }

    /**
     * Display a listing of the Bookings.
     */


     public function index()
    {
        $user = Auth::user();
        $vendor = $user->vendor;

        // Show bookings based on vendor
        if ($user->type == User::USER_TYPE_VENDOR) {
            $bookings = Booking::where('vendor_id', $vendor->id)->with(['room.property'])->latest()->get();
        } else {
            // Show bookings made by the user
            $bookings = [];
        }

            return view('backend.bookings.list', compact('bookings'));

    }
    /**
     * Show the form for creating a new Booking.
     */
    public function create()
    {
        $users = User::where("type",User::USER_TYPE_USER)->get();

        return view('backend.bookings.create',compact('users'));
    }

    /**
     * Store a newly created Booking in storage.
     */
    public function store(BookingFormRequest $request)
    {
        $this->bookingService->createBooking($request->validated());
        return redirect()->route('Bookings.index')->with('success', 'Booking created successfully.');
    }

    /**
     * Show the form for editing the specified Booking.
     */
    public function edit($id)
    {
        $booking = $this->bookingService->findBookingById($id);
        $users = User::all();
        return view('backend.bookings.edit', compact('Booking','users'));
    }

    /**
     * Update the specified Booking in storage.
     */
    public function update(BookingFormRequest $request, $id)
    {
        $this->bookingService->updateBooking($id, $request->validated());
        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified Booking from storage.
     */
    public function destroy($id)
    {
        $this->bookingService->deleteBooking($id);
        return redirect()->route('Bookings.index')->with('success', 'Booking deleted successfully.');
    }
    // public function changeStatus(Request $request)
    // {
    //     $request->validate([
    //         'booking_id' => 'required|exists:Bookings,id',
    //         'status' => 'required|in:pending,confirmed,cancelled',
    //     ]);
 
    //     $booking = Booking::findOrFail($request->booking_id);
    //     $booking->status = $request->status;
    //     $booking->save();
       
    //     if($request->status == Booking::STATUS_CONFIRMED){
    //         $room =  $booking->room;
    //         $property =  $room?->property;
    //         $vendor =  $property?->vendor;
    //     }



    //     return response()->json(['message' => 'Booking status updated successfully.']);
    // }

public function changeStatus(Request $request)
{
    $request->validate([
        'booking_id' => 'required|exists:bookings,id',
        'status' => 'required|in:pending,confirmed,cancelled',
    ]);

    $booking = Booking::findOrFail($request->booking_id);
    $booking->status = $request->status;
    $booking->save();

    if ($request->status == Booking::STATUS_CONFIRMED) {
        $room = $booking->room;
        $property =  $room?->property;
        $vendor =  $property?->vendor;
        $tenant = $booking->user; // assuming relation exists
        $weeklyPrice = $room->weekly_rent;
        
        // Get required values
        $startDate = Carbon::parse($booking->start_date);
        $endDate = Carbon::parse($booking->end_date);
        $roomId = $room->id;
        $tenantId = $tenant->id;
        $vendorId = $vendor?->id;

        // Create Tenant Payments
        while ($startDate < $endDate) {
            $weekEnd = $startDate->copy()->addDays(6);
            if ($weekEnd > $endDate) {
                $weekEnd = $endDate;
            }

            $daysInWeek = $startDate->diffInDays($weekEnd) + 1;
            $amount = round(($weeklyPrice / 7) * $daysInWeek, 2);

            TenantRent::create([
                'room_id' => $roomId,
                'user_id' => $tenantId,
                'vendor_id' => $vendorId,
                'amount' => $amount,
                'due_date' => $weekEnd->toDateString(),
                'status' => 'pending',

            ]);

            $startDate = $weekEnd->addDay();
        }
    }

    return response()->json(['message' => 'Booking status updated successfully.']);
}

    

    

}