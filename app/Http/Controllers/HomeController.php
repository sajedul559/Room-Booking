<?php

namespace App\Http\Controllers;

use App\Models\ReferralIncomeHistory;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        return view('home');
    }
    // private function dashboardData()
    // {
    //     $user_id = userId();
    //     $data['referral_income'] = ReferralIncomeHistory::where('referral_id', userId())->sum('amount');
    //     return $data;
    // }
}
