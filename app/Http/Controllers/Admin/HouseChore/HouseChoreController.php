<?php

namespace App\Http\Controllers\Admin\HouseChore;

use App\Models\HouseChore;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Services\Property\PropertyService;
use App\Http\Requests\HouseChoreFormRequest;
use App\Services\HouseChore\HouseChoreService;

class HouseChoreController extends Controller
{
    private $houseChoreService;
    protected $propertyService;


    public function __construct(HouseChoreService $houseChoreService, PropertyService $propertyService)
    {
        $this->houseChoreService = $houseChoreService;
        $this->propertyService = $propertyService;
         // Apply permission checks globally for these actions
         $this->middleware('can:Create House Chore')->only('create', 'store');
         $this->middleware('can:Edit House Chore')->only('edit', 'update');
         $this->middleware('can:Delete House Chore')->only('destroy');
         $this->middleware('can:Index House Chores')->only('index');
    }

    public function index()
    {
        $chores = $this->houseChoreService->getAll();

        return view('backend.house_chores.list', compact('chores'));
    }

    public function create()
    {
        $data = $this->houseChoreService->create();
        $properties = $this->propertyService->getAllProperties();

        return view('backend.house_chores.create',compact('data','properties'));
    }

    public function store(HouseChoreFormRequest $request)
    {
        $this->houseChoreService->store($request->validated());
        return redirect()->route('house_chores.index')->with('success', 'House chore created successfully!');
    }

    public function edit($id)
    {
        $chore = $this->houseChoreService->getById($id);
        $properties = $this->propertyService->getAllProperties();
        return view('backend.house_chores.edit', compact('chore','properties'));
    }

    public function update(HouseChoreFormRequest $request, $id)
    {
        $this->houseChoreService->update($id, $request->validated());
        return redirect()->route('house_chores.index')->with('success', 'House chore updated successfully!');
    }

    public function destroy($id)
    {
        $this->houseChoreService->delete($id);
        return redirect()->route('house_chores.index')->with('success', 'House chore deleted successfully!');
    }
}