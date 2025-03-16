<?php

namespace App\Services\Booking;

use App\Models\Property;

class BookingService
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
