<?php

namespace App\Http\Controllers\Admin\Property;

use App\Http\Requests\PropertyFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Services\Property\PropertyService;
use Barryvdh\Debugbar\Middleware\DebugbarEnabled;
use Illuminate\Http\Request;
use App\Models\Enums\TenantAcceptingOptions;
use App\Models\Enums\FurnishFeaturesEnum;

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
        $properties = $this->propertyService->getAllProperties();
        return view('backend.properties.list', compact('properties'));
    }

    public function create()
    {
        $furnishFeatureEnums = FurnishFeaturesEnum::cases();
        $tenantAcceptionOptions = TenantAcceptingOptions::cases();

        return view('backend.properties.create', compact('furnishFeatureEnums', 'tenantAcceptionOptions'));
    }

    public function store(PropertyFormRequest $request)
    {
        $this->propertyService->create($request->payloadsData());

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }

    public function edit(Property $property)
    {  
        $property->accessibility = explode(',', $property->accessibility);
        return view('backend.properties.edit', compact('property'));
    }

    public function update(PropertyFormRequest $request, Property $property)
    {
        $this->propertyService->update($property, $request->payloadsData());

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        $this->propertyService->delete($property);

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
