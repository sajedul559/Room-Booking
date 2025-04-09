<?php

namespace App\Services\Property;

use App\Models\Property;
use Illuminate\Support\Facades\Storage;

class PropertyService
{
    /**
     * Get all non-deleted properties with pagination.
     *
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAllProperties(int $perPage = 10)
    {
      
      return Property::with('vendor.user')->where('is_publish','1')->get();

    }
    public function create(array $data)
    {
        $data['vendor_id'] = auth()->id();
        $data['created_by'] = auth()->id();
        $data['last_updated_by'] = auth()->id();
        if (isset($data['image']) && $data['image']->isValid()) {
            $file = $data['image'];
        
            // Generate a unique filename
            $imageName = time() . '.' . $file->getClientOriginalExtension();
        
            // Store the file in 'storage/app/public/image/'
            $path = Storage::disk('public')->putFileAs('image', $file, $imageName);
        
            // Save only the relative path to the database
            $data['image_path'] = $path;
        }

        return Property::create($data);
    }

    public function update(Property $property, array $data)
    {
        $data['last_updated_by'] = auth()->id();
        $property->update($data);

        return $property;
    }

    public function delete(Property $property)
    {
        $property->delete();
    }
}
