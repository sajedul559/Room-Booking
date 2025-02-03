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
            $this->uploadImages($room, $data['images']);
        }

        return $room;
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