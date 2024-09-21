<?php

namespace App\Http\Controllers\Admin\Property;

use App\Http\Requests\PropertyFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Services\Property\PropertyService;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    protected $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;

        // Apply permission checks globally for these actions
        $this->middleware('can:Create Property')->only('create', 'store');
        $this->middleware('can:Edit Property')->only('edit', 'update');
        $this->middleware('can:Delete Property')->only('destroy');
        $this->middleware('can:Index Properties')->only('index');
    }

    public function index()
    {
        // Permission already checked by middleware
        $properties = $this->propertyService->getAllProperties();
        return view('backend.properties.list', compact('properties'));
    }

    public function create()
    {
        return view('backend.properties.create');
    }

    public function store(PropertyFormRequest $request)
    {
        $this->propertyService->create($request->payloadsData());

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }

    public function edit(Property $property)
    {
        return view('backend.properties.edit', compact('property'));
    }

    public function update(PropertyFormRequest $request, Property $property)
    {
        // Check permission manually and abort with 403 if not authorized
        $this->authorize('Edit Property');

        $this->propertyService->update($property, $request->payloadsData());

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        // Check permission manually and abort with 403 if not authorized
        $this->authorize('Delete Property');

        $this->propertyService->delete($property);

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
