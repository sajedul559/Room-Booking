<?php

namespace App\Services\Room;

use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Support\Facades\Storage;

class RoomService
{
    public function create(array $data, $createdBy)
    {
        $room = Room::create(array_merge($data, ['created_by' => $createdBy]));

        if (isset($data['images'])) {
            $this->uploadImages($room, $data['images']);
        }

        return $room;
    }

    public function update(Room $room, array $data, $updatedBy)
    {
        $room->update(array_merge($data, ['updated_by' => $updatedBy]));

        
        if (isset($data['images'])) {
             // Delete old images
             $this->galleryImageDelete($data, $room->id);

            $this->uploadImages($room, $data['images']);
        }

        return $room;
    }
    public function galleryImageDelete($data, $roomId)
    {
        // If 'old' images exist, keep them, otherwise delete all images for the room
        $query = RoomImage::where('room_id', $roomId);
        
        if (isset($data['old'])) {
            $query->whereNotIn('id', $data['old']);
        }
    
        $roomImages = $query->get();
    
        foreach ($roomImages as $roomImage) {
            // Delete the image file from storage
            Storage::disk('public')->delete($roomImage->image_path);
    
            // Delete the database record
            $roomImage->delete();
        }
    }
    public function delete(Room $room)
    {
        foreach ($room->images as $image) {
            Storage::delete($image->image_path);
            $image->delete();
        }

        $room->delete();
    }

    private function uploadImages(Room $room, $images)
    {
        foreach ($images as $image) {
            $path = $image->store('rooms', 'public');

            RoomImage::create([
                'room_id' => $room->id,
                'image_path' => $path,
            ]);
        }
    }
}