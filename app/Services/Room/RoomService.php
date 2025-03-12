<?php

namespace App\Services\Room;

use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RoomService
{
    public function create(array $data, $createdBy)
    {
        if(isset($data['name'])){
            $data['slug'] = Str::slug($data['name']);
        }
        if (!empty($data['video_url'])) {
            $data['video_url'] = convertToEmbedUrl($data['video_url']);
        }
        if (isset($data['video_image']) && $data['video_image']->isValid()) {
            $file = $data['video_image'];
        
            // Generate a unique filename
            $imageName = time() . '.' . $file->getClientOriginalExtension();
        
            // Store the file in 'storage/app/public/video_thumbnails/'
            $path = Storage::disk('public')->putFileAs('video_thumbnails', $file, $imageName);
        
            // Save only the relative path to the database
            $data['video_image'] = $path;
        }
        if (isset($data['room_image']) && $data['room_image']->isValid()) {
            $file = $data['room_image'];
        
            // Generate a unique filename
            $imageName = time() . '.' . $file->getClientOriginalExtension();
        
            // Store the file in 'storage/app/public/room_image/'
            $path = Storage::disk('public')->putFileAs('room_image', $file, $imageName);
        
            // Save only the relative path to the database
            $data['room_image'] = $path;
        }
        $room = Room::create(array_merge($data, ['created_by' => $createdBy]));

        
        if (isset($data['images'])) {
            $this->uploadImages($room, $data['images']);
        }

        return $room;
    }

    public function update(Room $room, array $data, $updatedBy)
    {
        if (isset($data['video_image']) && $data['video_image']->isValid()) {
            $file = $data['video_image'];
        
            // Generate a unique filename
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $oldImage = $room->video_image; // Assuming $room is the model instance
            // Delete the old image if it exists
            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
            // Store the file in 'storage/app/public/video_thumbnails/'
            $path = Storage::disk('public')->putFileAs('video_thumbnails', $file, $imageName);
        
            // Save only the relative path to the database
            $data['video_image'] = $path;
        }
        if (isset($data['room_image']) && $data['room_image']->isValid()) {
            $file = $data['room_image'];
        
            // Generate a unique filename
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $oldImage = $room->room_image; // Assuming $room is the model instance
            // Delete the old image if it exists
            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
            // Store the file in 'storage/app/public/room_image/'
            $path = Storage::disk('public')->putFileAs('room_image', $file, $imageName);
        
            // Save only the relative path to the database
            $data['room_image'] = $path;
        }
        if (!empty($data['video_url'])) {
            $data['video_url'] = convertToEmbedUrl($data['video_url']);
        }
        $room->update(array_merge($data, ['updated_by' => $updatedBy]));

      
    // Save only the relative path to the database

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