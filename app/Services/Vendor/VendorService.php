<?php

namespace App\Services\Vendor;

use App\Models\Vendor;

class VendorService
{
    public function getAllVendors()
    {
        return Vendor::all();
    }

    public function findVendorById(string $id)
    {
        return Vendor::findOrFail($id);
    }

    public function createVendor(array $data)
    {
        $data['id'] = (string) \Illuminate\Support\Str::uuid();
        return Vendor::create($data);
    }

    public function updateVendor(string $id, array $data)
    {
        $vendor = $this->findVendorById($id);
        $vendor->update($data);
        return $vendor;
    }

    public function deleteVendor(string $id)
    {
        $vendor = $this->findVendorById($id);
        return $vendor->delete();
    }
}
