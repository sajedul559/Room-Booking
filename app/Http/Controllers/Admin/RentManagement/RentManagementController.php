<?php

namespace App\Http\Controllers\Admin\RentManagement;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RentManagement;
use App\Http\Controllers\Controller;
use App\Services\Vendor\VendorService;
use App\Services\Property\PropertyService;
use App\Http\Requests\RentManagementFormRequest;
use App\Services\RentManagement\RentManagementService;

class RentManagementController extends Controller
{
    protected $rentManagementService;
    protected $vendorService;
    protected $propertyService;


    public function __construct(RentManagementService $rentManagementService, VendorService $vendorService, PropertyService $propertyService)
    {
        $this->rentManagementService = $rentManagementService;
        $this->vendorService = $vendorService;
        $this->propertyService = $propertyService;
        // Apply permission checks globally for these actions
        $this->middleware('can:Create Expense')->only('create', 'store');
        $this->middleware('can:Edit Expense')->only('edit', 'update');
        $this->middleware('can:Delete Expense')->only('destroy');
        $this->middleware('can:Index Properties')->only('index');
    }


    public function index()
    {
        $rentManagements = $this->rentManagementService->getAllRentManagements();
        return view('backend.rent_managements.list', compact('rentManagements'));
    }

    public function create()
    {
        $data = $this->rentManagementService->create();
        return view('backend.rent_managements.create',compact('data'));
    }
    public function calender(Request $request)
    {
        $month = $request->query('month', date('m'));

        $rents = RentManagement::whereMonth('created_at', $month)
                    ->orderBy('created_at', 'asc')
                    ->get();
    
        return view('backend.rent_managements.calender', compact('rents'));
    }
    public function getRentEvents(Request $request)
    {
        $month = $request->query('month', now()->month);
        $year = $request->query('year', now()->year);
    
        \Log::info("Fetching rent events for: Month - $month, Year - $year");
    
        $rents = RentManagement::with(['user', 'property', 'room']) // eager load relationships
                               ->whereMonth('date', $month)
                               ->whereYear('date', $year)
                               ->get();
    
        $events = [];
    
        foreach ($rents as $rent) {
            $dueDate = Carbon::parse($rent->date);
            $statusColor = '';
            $text = Str::limit(optional($rent->user)->name ?? 'Unknown', 15);
    
            if ($dueDate->isPast()) {
                $statusColor = '#dc3545'; // Overdue
            } elseif ($dueDate->diffInDays(Carbon::today()) <= 2) {
                $statusColor = '#ffc107'; // Due Soon
            } else {
                $statusColor = '#28a745'; // Upcoming
            }
    
            $propertyName = optional($rent->property)->property_name ?? 'N/A';
            $propertyAddress = optional($rent->property)->location ?? 'N/A';
            $roomName = optional($rent->room)->name ?? 'N/A';
    
            $tooltipText = "{$text} – {$propertyName}, {$propertyAddress}, {$roomName}. "
                         . "Total Rent: " . number_format($rent->total_rent, 2)
                         . ". Current Rent: " . number_format($rent->amount, 2)
                         . ". Due Rent: " . number_format($rent->total_rent - $rent->amount, 2);
    
            $events[] = [
                'title' => $text . ': $' . number_format($rent->amount, 2),
                'start' => $rent->date,
                'color' => $statusColor,
                'amount' => $rent->amount,
                'tooltip' => $tooltipText
            ];
        }
    
        return response()->json($events);
    }
    
    
    public function store(RentManagementFormRequest $request)
    {
        // dd("workng",$request->all());
        $this->rentManagementService->createRentManagement($request->payloadsData());
        return redirect()->route('rent_managements.index')->with('success', 'Rent created successfully.');
    }

    public function edit($id)
    {
        $rentManagement = $this->rentManagementService->getRentManagementById($id);
        $vendors = $this->vendorService->getAllVendors();
        $data = $this->rentManagementService->create();

        $properties = $this->propertyService->getAllProperties();

        return view('backend.rent_managements.edit', compact('vendors','properties','data','rentManagement'));
    }

    public function update(RentManagementFormRequest $request, $id)
    {
        $this->rentManagementService->updateRentManagement($id, $request->payloadsData());
        return redirect()->route('rent_managements.index')->with('success', 'Rent updated successfully.');
    }
    public function filter(Request $request)
    {
        $query = RentManagement::with(['room', 'property']);

        if ($request->filled('year')) {
            $query->whereYear('date', $request->year);
        }

        if ($request->filled('month')) {
            $query->whereMonth('date', $request->month);
        }

        $rentManagements = $query->latest()->get();

        $html = view('backend.rent_managements.rows', compact('rentManagements'))->render();

        return response()->json(['html' => $html]);
    }
    public function destroy($id)
    {
        $this->rentManagementService->deleteRentManagement($id);
        return redirect()->route('rent_managements.index')->with('success', 'Rent deleted successfully.');
    }
}