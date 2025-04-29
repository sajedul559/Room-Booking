<?php

namespace App\Services\HouseChore;

use App\Models\Vendor;
use App\Models\Property;
use App\Models\HouseChore;

class HouseChoreService
{
    public function getAll()
    {
        return HouseChore::with('vendor.user')->get();
        
    }

    public function getById($id)
    {
        return HouseChore::findOrFail($id);
    }

    // public function create()
    // {
    //     $data['created_by'] = auth()->id();
    //     return HouseChore::create($data);
    // }
    public function create()
    {
        $data = [
            'vendors' => Vendor::all(), // Fetch all vendors
            'properties' => Property::all(), // Fetch all properties
            'created_by' => auth()->id()
        ];
        return  $data;
    }

    public function store(array $data)
    {
        $data['created_by'] = auth()->id();
        if(isset($data['cleaner_booked'])){
            $data['cleaner_booked'] = 1;
        }else{
            $data['cleaner_booked'] = 0;
        }
        return HouseChore::create($data);
    }

    public function update($id, array $data)
    {
        $chore = HouseChore::findOrFail($id);
        $data['last_updated_by'] = auth()->id();
        if(isset($data['cleaner_booked'])){
            $data['cleaner_booked'] = 1;
        }else{
            $data['cleaner_booked'] = 0;
        }
        
        $chore->update($data);
        return $chore;
    }

    public function delete($id)
    {
        $chore = HouseChore::findOrFail($id);
        $chore->delete();
    }
}
