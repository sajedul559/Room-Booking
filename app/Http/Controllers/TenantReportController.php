<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\TenantReport;
use Illuminate\Http\Request;

class TenantReportController extends Controller
{
    public function index()
    {
        $reports = TenantReport::with('vendor', 'property', 'createdBy', 'lastUpdatedBy')->get();
        return view('backend.tenant_reports.index', compact('reports'));
    }

    public function create()
    {
        $properties = Property::where('is_publish',1)->get();
        return view('tenant-report',compact('properties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => 'nullable|exists:vendors,id',
            'property_id' => 'required|exists:properties,id',
            'report_details' => 'required|string',
        ]);
        // Fetch the property to get its associated vendor_id
        $property = Property::findOrFail($request->property_id);
        $vendorId = $property->vendor_id;

        TenantReport::create([
            'vendor_id' => $vendorId,
            'property_id' => $property->id,
            'report_details' => $request->report_details,
            'status' => 'Pending',
            'created_by' => auth()->id(),
            'last_updated_by' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Tenant Report Created Successfully');
    }

    public function show(TenantReport $tenantReport)
    {
        return view('tenant_reports.show', compact('tenantReport'));
    }

    public function edit(TenantReport $tenantReport)
    {
        return view('tenant_reports.edit', compact('tenantReport'));
    }

    public function update(Request $request, TenantReport $tenantReport)
    {
        $request->validate([
            'vendor_id' => 'required|exists:vendors,id',
            'property_id' => 'required|exists:properties,id',
            'report_details' => 'required|string',
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);

        $tenantReport->update([
            'vendor_id' => $request->vendor_id,
            'property_id' => $request->property_id,
            'report_details' => $request->report_details,
            'status' => $request->status,
            'last_updated_by' => auth()->id(),
        ]);

        return redirect()->route('tenant-reports.index')->with('success', 'Tenant Report Updated Successfully');
    }

    public function destroy(TenantReport $tenantReport)
    {
        $tenantReport->delete();
        return redirect()->route('tenant-reports.index')->with('success', 'Tenant Report Deleted Successfully');
    }
}

