<?php

namespace App\Http\Controllers;

use App\Models\Room;
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
        return view('index',compact('rooms'));
    }
    public function allRooms()
    {
        $rooms = Room::with('images')->get();
        return view('rent-property-grid',compact('rooms'));
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
}
