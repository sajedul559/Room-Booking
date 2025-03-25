<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReferralIncomeHistory;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }



    public function home()
    {
        $rooms = Room::with('images')->get();
        return view('home',compact('rooms'));
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
