<?php

namespace App\Http\Controllers\Admin\HouseChore;

use App\Http\Requests\HouseChoreFormRequest;
use App\Http\Controllers\Controller;

use App\Models\HouseChore;
use App\Services\HouseChore\HouseChoreService;
use Illuminate\Http\Request;

class HouseChoreController extends Controller
{
    private $houseChoreService;

    public function __construct(HouseChoreService $houseChoreService)
    {
        $this->houseChoreService = $houseChoreService;
    }

    public function index()
    {
        $chores = $this->houseChoreService->getAll();
        return view('backend.house_chores.list', compact('chores'));
    }

    public function create()
    {
        $data = $this->houseChoreService->create();

        return view('backend.house_chores.create',$data);
    }

    public function store(HouseChoreFormRequest $request)
    {
        $this->houseChoreService->store($request->validated());
        return redirect()->route('house_chores.index')->with('success', 'House chore created successfully!');
    }

    public function edit($id)
    {
        $chore = $this->houseChoreService->getById($id);
        return view('backend.house_chores.edit', compact('chore'));
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