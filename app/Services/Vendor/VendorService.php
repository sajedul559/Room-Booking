<?php

namespace App\Services\Vendor;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

    //Register Vendor From Frontend
   public function registerVendor(array $data)
    {
        DB::beginTransaction();

        try {
            // 1. Create User
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
                'type' => User::USER_TYPE_VENDOR,
                'is_active' => true,
            ]);

            // 2. Handle ID Verification Upload
            $idVerificationPath = null;
            if (isset($data['id_verification'])) {
                $idVerificationPath = $data['id_verification']->store('id_verifications', 'public');
            }

            // 3. Create Vendor with extended data
            Vendor::create([
                'user_id' => $user->id,
                'phone' => $data['phone'],
                'email' => $data['email'],
                'status' => Vendor::VENDOR_STATUS_PENDING,
                'id_verification' => $idVerificationPath,
                'address' => $data['address'] ?? null,
                'country' => $data['country'] ?? null,
                'state' => $data['state'] ?? null,
                'city' => $data['city'] ?? null,
            ]);

            DB::commit();

            return ['success' => true];

        } catch (\Exception $e) {
            DB::rollBack();
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

}
