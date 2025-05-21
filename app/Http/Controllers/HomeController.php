<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Partner;
use App\Models\Property;
use App\Models\RoomReview;
use Illuminate\Http\Request;
use App\Models\ReferralIncomeHistory;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }



    public function index()
    {
        $user = auth()->user();
        $rooms = Room::with('images')->get();
        $properties = Property::where('is_publish','1')->get();
        $partners = Partner::where('status','1')->get();
        return view('index',compact('rooms','properties','partners'));
    }
    public function aboutUs()
    {
        // dd("workiing");
        $partners = Partner::where('status','1')->get();
        return view('about-us',compact('partners'));
    }
    public function allRoom()
    {
       
        $rooms = Room::with('images')->get();     
        return view('room',compact('rooms'));
    }

    public function allProperty()
    {
        $rooms = Room::with('images')->get();
        $properties = Property::where('is_publish','1')->paginate(6);

        return view('rent-property-grid',compact('rooms','properties'));
    }

  public function roomDetails($slug)
  {
        $room = Room::with('images', 'reviews')->where('slug', $slug)->firstOrFail();
        $roomReviewCount = $room->reviews->where('status',RoomReview::STATUS_CONFIRMED)->count();

        $bookingCount = 0;
        $reviewCount = 0;
        $canReview = false;

        if (auth()->check()) {
            $user = auth()->user();

            $bookingCount = Booking::where('room_id', $room->id)
                ->where('user_id', $user->id)
                ->where('status', Booking::STATUS_CONFIRMED)
                ->count();

            $reviewCount = RoomReview::where('room_id', $room->id)
                ->where('user_id', $user->id)
                ->count();

            $canReview = $bookingCount > $reviewCount;
        }

        // Load different perPage value depending on AJAX or not
        $perPage = request()->ajax() ? 3 : 3;

        $reviews = RoomReview::where('room_id', $room->id) ->where('status', RoomReview::STATUS_CONFIRMED)->latest()->paginate($perPage);


        if (request()->ajax()) {
            return view('partials._review', compact('reviews'))->render();
        }

        return view('rent-details', compact('room', 'canReview', 'reviews','roomReviewCount'));
  }

    // private function dashboardData()
    // {
    //     $user_id = userId();
    //     $data['referral_income'] = ReferralIncomeHistory::where('referral_id', userId())->sum('amount');
    //     return $data;
    // }
    public function locationWiseRoom(Request $request)
    {
        $location = $request->location;
    
        $rooms = Room::with(['images', 'property'])
            ->when($location, function ($query) use ($location) {
                $query->whereHas('property', function ($q) use ($location) {
                    $q->where('city', 'LIKE', "%{$location}%");
                });
            })
            ->get();
    
        return view('room', compact('rooms', 'location'));
    }
    public function searchRooms(Request $request)
    {
        // dd($request->all());
        $rooms = Room::with(['images', 'property'])
            ->when($request->room_name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->room_name . '%');
            })

            ->when($request->property_city, function ($query) use ($request) {
                $query->whereHas('property', function ($q) use ($request) {
                    $q->where('city', 'LIKE', '%' . $request->property_city . '%');
                });
            })
            ->when($request->min_price, function ($query) use ($request) {
                $query->where('price', '>=', $request->min_price);
            })
            ->when($request->max_price, function ($query) use ($request) {
                $query->where('price', '<=', $request->max_price);
            })
            ->get();

        return view('search_room', compact('rooms'));
    }
    public function storeReview(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'comment' => 'required|string',
            'star' => 'required|integer|min:1|max:5',
        ]);

        RoomReview::create($validated);

        return back()->with('success', 'Review submitted successfully!');
    }

    

}
