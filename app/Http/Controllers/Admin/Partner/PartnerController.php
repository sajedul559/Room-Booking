<?php

namespace App\Http\Controllers\Admin\Partner;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Services\Partner\PartnerService;
use App\Http\Requests\PartnerFormRequest;

class PartnerController extends Controller
{
    protected $service;

    public function __construct(PartnerService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $partners = Partner::latest()->paginate(10);
        return view('backend.partners.list', compact('partners'));
    }

    public function create()
    {
        return view('backend.partners.create');

    }

    public function store(PartnerRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('partners.index')->with('success', 'Partner created successfully.');
    }

    public function edit(Partner $partner)
    {
        return view('backend.partners.edit', compact('partner'));
    }

    public function update(PartnerRequest $request, Partner $partner)
    {
        $this->service->update($partner, $request->validated());
        return redirect()->route('partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        $this->service->delete($partner);
        return redirect()->route('partners.index')->with('success', 'Partner deleted successfully.');
    }
}