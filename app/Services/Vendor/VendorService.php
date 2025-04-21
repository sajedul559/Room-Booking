<?php

namespace App\Services\Vendor;

use App\Models\Vendor;
use Illuminate\Support\Facades\Storage;

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
        if (isset($data['id_verification']) && $data['id_verification']->isValid()) {
            $file = $data['id_verification'];
        
            // Generate a unique filename
            $imageName = time() . '.' . $file->getClientOriginalExtension();
        
            // Store the file in 'storage/app/public/image/'
            $path = Storage::disk('public')->putFileAs('image', $file, $imageName);
        
            // Save only the relative path to the database
            $data['id_verification'] = $path;
        }
        return Vendor::create($data);
    }

    public function updateVendor(string $id, array $data)
    {
        $vendor = $this->findVendorById($id);
        if (isset($data['id_verification']) && $data['id_verification']->isValid()) {
             // Delete old image if it exists
             if ($vendor->id_verification && Storage::disk('public')->exists($vendor->id_verification)) {
                Storage::disk('public')->delete($vendor->id_verification);
             }
            $file = $data['id_verification'];
        
            // Generate a unique filename
            $imageName = time() . '.' . $file->getClientOriginalExtension();
        
            // Store the file in 'storage/app/public/image/'
            $path = Storage::disk('public')->putFileAs('image', $file, $imageName);
        
            // Save only the relative path to the database
            $data['id_verification'] = $path;
        }
        $vendor->update($data);
        return $vendor;
    }

    public function deleteVendor(string $id)
    {
        $vendor = $this->findVendorById($id);
        return $vendor->delete();
    }
}
