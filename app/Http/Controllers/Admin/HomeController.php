<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function getExpenseData($month)
    {
        $year = Carbon::now()->year;

        $expenses = DB::table('expenses')
            ->selectRaw('category, SUM(amount) as total')
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->groupBy('category')
            ->get();

        return response()->json([
            'labels' => $expenses->pluck('category'),
            'values' => $expenses->pluck('total')
        ]);
    }

    public function getIncomeData($month)
    {
        $year = Carbon::now()->year;

        $income = DB::table('payments')
            ->selectRaw('WEEK(date) as week, SUM(amount) as total')
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->groupBy('week')
            ->get();

        return response()->json([
            'labels' => $income->pluck('week')->map(fn($w) => "Week $w"),
            'values' => $income->pluck('total')
        ]);
    }

    public function fetchData(Request $request)
    {
        $month = $request->input('month');
        $type = $request->input('type');
        $year = date('Y');

        if ($type === 'expense') {
            $data = DB::table('expenses')
                ->select(DB::raw('DAY(created_at) as day'), DB::raw('SUM(amount) as total'))
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->groupBy('day')
                ->orderBy('day')
                ->get();
        } else {
            $data = DB::table('payments')
                ->select(DB::raw('DAY(created_at) as day'), DB::raw('SUM(amount) as total'))
                ->whereMonth('created_at', $month)
                ->whereYear('created_at', $year)
                ->groupBy('day')
                ->orderBy('day')
                ->get();
        }

        return response()->json([
            'labels' => $data->pluck('day'),
            'data' => $data->pluck('total'),
        ]);
    }
    // private function dashboardData()
    // {
    //     $user_id = userId();
    //     $data['referral_income'] = ReferralIncomeHistory::where('referral_id', userId())->sum('amount');
    //     return $data;
    // }
}
