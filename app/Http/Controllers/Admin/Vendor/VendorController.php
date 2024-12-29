<?php

namespace App\Http\Controllers\Admin\Vendor;

use App\Models\User;
use App\Models\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Vendor\VendorService;
use App\Http\Requests\VendorFormRequest;

class VendorController extends Controller
{
    protected $vendorService;

    public function __construct(VendorService $vendorService)
    {
        $this->vendorService = $vendorService;
        // Apply permission checks globally for these actions
        $this->middleware('can:Create Vendor')->only('create', 'store');
        $this->middleware('can:Edit Vendor')->only('edit', 'update');
        $this->middleware('can:Delete Vendor')->only('destroy');
        $this->middleware('can:Index Vendors')->only('index');
        
    }

    /**
     * Display a listing of the vendors.
     */
    public function index()
    {
        $vendors = $this->vendorService->getAllVendors();
        return view('backend.vendors.list', compact('vendors'));
    }

    /**
     * Show the form for creating a new vendor.
     */
    public function create()
    {
        $users = User::all();

        return view('backend.vendors.create',compact('users'));
    }

    /**
     * Store a newly created vendor in storage.
     */
    public function store(VendorFormRequest $request)
    {
        $this->vendorService->createVendor($request->validated());
        return redirect()->route('vendors.index')->with('success', 'Vendor created successfully.');
    }

    /**
     * Show the form for editing the specified vendor.
     */
    public function edit($id)
    {
        $vendor = $this->vendorService->findVendorById($id);
        return view('backend.vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified vendor in storage.
     */
    public function update(VendorFormRequest $request, $id)
    {
        $this->vendorService->updateVendor($id, $request->validated());
        return redirect()->route('vendors.index')->with('success', 'Vendor updated successfully.');
    }

    /**
     * Remove the specified vendor from storage.
     */
    public function destroy($id)
    {
        $this->vendorService->deleteVendor($id);
        return redirect()->route('vendors.index')->with('success', 'Vendor deleted successfully.');
    }
}