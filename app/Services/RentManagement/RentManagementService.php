<?php

namespace App\Services\RentManagement;

use App\Models\RentManagement;

class RentManagementService
{
    public function getAllRentManagements()
    {
        return RentManagement::all();
    }
    public function create()
    {
       
        return [
            'vendors' => getApprovedVendors(),
            'properties' => getPublishedProperties(),
            'rooms' => getRooms(),
            'tenants' => getUsers(),
        ];
    }
    
    public function createRentManagement(array $data)
    {
        $data['created_by'] = auth()->id();
        $data['last_updated_by'] = auth()->id();
        $data['payment_collect_by'] = auth()->id();
        return RentManagement::create($data);
    }

    public function getRentManagementById($id)
    {
        return RentManagement::findOrFail($id);
    }

    public function updateRentManagement($id, array $data)
    {
        $rentManagement = RentManagement::findOrFail($id);
        $data['is_credit'] = isset($data['is_credit']) ? 1 : 0;

        $data['updated_by'] = auth()->id();
        $data['last_updated_by'] = auth()->id();
        $rentManagement->update($data);
        return $rentManagement;
    }

    public function deleteRentManagement($id)
    {
        $rentManagement = RentManagement::findOrFail($id);
        $rentManagement->delete();
    }
}