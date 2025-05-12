<?php

namespace App\Services\Partner;

use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class PartnerService
{
    /**
     * Get all partners with optional pagination.
     *
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAll(int $perPage = 10)
    {
        return Partner::latest()->paginate($perPage);
    }

    /**
     * Create a new partner.
     *
     * @param array $data
     * @return Partner
     */
    public function store(array $data): Partner
    {
        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        if (isset($data['image']) && $data['image']->isValid()) {
            $file = $data['image'];
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('partners', $file, $imageName);
            $data['image_path'] = $path;
        }

        return Partner::create($data);
    }

    /**
     * Update an existing partner.
     *
     * @param Partner $partner
     * @param array $data
     * @return Partner
     */
    public function update(Partner $partner, array $data): Partner
    {
        $data['updated_by'] = auth()->id();

        if (isset($data['image']) && $data['image']->isValid()) {
            if ($partner->image_path && Storage::disk('public')->exists($partner->image_path)) {
                Storage::disk('public')->delete($partner->image_path);
            }

            $file = $data['image'];
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $path = Storage::disk('public')->putFileAs('partners', $file, $imageName);
            $data['image_path'] = $path;
        }

        $partner->update($data);

        return $partner;
    }

    /**
     * Delete a partner.
     *
     * @param Partner $partner
     * @return void
     */
    public function delete(Partner $partner): void
    {
        if ($partner->image_path && Storage::disk('public')->exists($partner->image_path)) {
            Storage::disk('public')->delete($partner->image_path);
        }

        $partner->delete();
    }
}
