<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Property;
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
        $rooms = Room::with('images')->get();
        $properties = Property::where('is_publish','1')->get();
        return view('index',compact('rooms','properties'));
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
        // Retrieve the room using the slug
        $room = Room::with('images')->where('slug', $slug)->firstOrFail();
    
        return view('rent-details', compact('room'));
    }
    

    // private function dashboardData()
    // {
    //     $user_id = userId();
    //     $data['referral_income'] = ReferralIncomeHistory::where('referral_id', userId())->sum('amount');
    //     return $data;
    // }
    public function locationWiseRoom($location){

        if(isset($location))
        {
            $rooms = Room::with(['images', 'property'])
            ->when($location, function ($query) use ($location) {
                $query->whereHas('property', function ($q) use ($location) {
                    $q->where('city', 'LIKE', "%{$location}%");
                });
            })
            ->get();
            return view('room',compact('rooms','location'));

        }

    }

}
